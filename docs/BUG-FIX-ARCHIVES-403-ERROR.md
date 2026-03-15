# Bug Fix: HTTP 403 Forbidden on /admin/archives

**Status:** ✅ RESOLVED  
**Date Fixed:** 15 Maret 2026  
**Severity:** HIGH (Blocks admin archive functionality)  
**Environment:** Local development

---

## Issue Description

When accessing the archive management page at `/admin/archives`, authenticated users with `admin lppm` role received:

```
HTTP 403 Forbidden
"User does not have the right permissions."
```

Despite having the `admin lppm` role assigned, the permission middleware was rejecting access to the page that requires `module_arsip_data` permission.

### User Journey

1. User logs in as `admin lppm`
2. User navigates to `/admin/archives`
3. Spatie `PermissionMiddleware` intercepts request
4. Middleware checks: `user->hasPermissionTo('module_arsip_data')`
5. Check fails → HTTP 403 returned

### Log Evidence

From `storage/logs/laravel.log`:

```json
{
  "url": "http://127.0.0.1:8000/admin/archives",
  "user_id": "019cf205-f95f-71f8-a756-15c1fa5738a0",
  "active_role": "admin lppm",
  "message": "User does not have the right permissions.",
  "class": "Spatie\Permission\Exceptions\UnauthorizedException"
}
```

Note: `active_role` is `"admin lppm"` but permission check still fails.

---

## Root Cause Analysis

### The Problem

The `admin lppm` role existed in the database but **had no permissions assigned to it**.

```
Verification via tinker (BEFORE FIX):
- Role found: admin lppm
- Has module_arsip_data: NO
- All permissions: (empty list)
```

### Why This Happened

The **RoleSeeder was never executed** to assign permissions to roles. The database had empty role records created, but the permission assignments from `database/seeders/RoleSeeder.php` had not run.

This typically occurs when:

1. **Initial setup**: Database initialized but `db:seed` not run
2. **Fresh migration**: Database tables created but permissions not seeded
3. **Manual database setup**: Tables created manually without running seeders
4. **Testing environment**: Permission cache may be cleared but role-permission bindings never created

### Route Configuration (Correct)

The route itself was correctly configured in `routes/web.php:223`:

```php
Route::get('admin/archives', \App\Livewire\Admin\Archive\ManageArchives::class)
    ->middleware(['permission:module_arsip_data'])
    ->name('admin.archives');
```

### Role Seeder (Correct)

The `database/seeders/RoleSeeder.php:53` correctly mapped the permission:

```php
'module_arsip_data' => ['admin lppm'],
```

### Middleware Stack (Correct)

The middleware was properly configured in `bootstrap/app.php:27-28`:

```php
$middleware->alias([
    'permission' => PermissionMiddleware::class,
]);
```

**Conclusion**: Configuration was perfect; the seeder simply had not been executed.

---

## Solution

### Step 1: Run RoleSeeder

```bash
php artisan db:seed --class=RoleSeeder
```

This executed the mapping logic and created all role-permission bindings:
- Created all 7 roles (`superadmin`, `admin lppm`, `kepala lppm`, `dekan`, `dosen`, `reviewer`, `rektor`)
- Created all 14 permissions (`module_penelitian`, `module_pengabdian`, etc.)
- Assigned permissions to roles according to the mapping

### Step 2: Clear Application Cache

```bash
php artisan optimize:clear
```

This cleared:
- Bootstrap cache
- Configuration cache
- Route cache
- View cache
- Event cache
- Compiled service providers

### Verification

After the fix:

```
Role found: admin lppm
Has module_arsip_data: YES
All permissions:
  - module_laporan
  - module_pengabdian
  - module_monev
  - module_kelola_pengguna
  - module_review
  - module_arsip_data ✓
  - module_pengaturan
  - module_export_sinta
  - module_penelitian
  - module_iku
  - module_reviewer_management
```

Access to `/admin/archives` now succeeds for `admin lppm` users.

---

## Impact Analysis

### Files Affected

None. This was a data initialization issue, not a code issue.

### Database Changes

- `roles` table: No changes (roles already existed)
- `permissions` table: Populated with 14 permission records
- `role_has_permissions` table: Populated with role-permission bindings

### Test Results

```
Tests:    142 passed
Status:   ✅ All tests passing (same as before)
Duration: 55.13s
```

No regressions introduced. The fix is purely additive (adding missing data).

---

## Prevention Strategy

### 1. **Automated Seeder in Installation**

Ensure RoleSeeder runs automatically during:
- Fresh `php artisan migrate:fresh --seed`
- Application installation process
- Deployment initialization scripts

### 2. **Installation Checklist**

Add to deployment documentation:

```bash
# Essential setup commands
php artisan migrate:fresh
php artisan db:seed --class=RoleSeeder
php artisan optimize:clear
```

### 3. **Production Deployment**

In production initialization (`deploy.sh` or similar):

```bash
#!/bin/bash
php artisan migrate --force
php artisan db:seed --class=RoleSeeder --force
php artisan optimize:clear
```

### 4. **Health Check**

Add a monitoring check to verify role-permission bindings:

```php
// app/Console/Commands/VerifyPermissions.php
if (!Role::where('name', 'admin lppm')->first()?->hasPermissionTo('module_arsip_data')) {
    throw new Exception('admin lppm role missing required permissions');
}
```

### 5. **Test Coverage**

The test suite already includes this validation in `tests/Feature/Admin/ArchiveImportTest.php`:

```php
protected function setUp(): void
{
    parent::setUp();
    $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    $this->seed(\Database\Seeders\RoleSeeder::class);
}
```

This ensures tests always have fresh, correct role-permission mappings.

---

## Related Issues

Similar 403 errors occurred for other admin-only routes that also require RoleSeeder:

- `/export-sinta` (requires `module_export_sinta` permission)
- `/admin-lppm/monev` (requires `module_monev` permission)

All fixed by the same solution: running RoleSeeder.

---

## Timeline

| Time | Event |
| --- | --- |
| 22:58:10 | User reported 403 error on `/admin/archives` |
| 23:00 | Agent identified route configuration was correct |
| 23:05 | Agent traced permission middleware behavior |
| 23:10 | Root cause identified: RoleSeeder never executed |
| 23:12 | Solution executed: `php artisan db:seed --class=RoleSeeder` |
| 23:13 | Verified fix: admin lppm now has `module_arsip_data` permission |
| 23:15 | Cache cleared: `php artisan optimize:clear` |
| 23:16 | Test suite run: 142/142 tests passing ✅ |
| 23:20 | Bug report completed |

**Total Resolution Time:** ~20 minutes

---

## Checklist for Future Deployments

- [ ] Database migrations have run: `php artisan migrate --force`
- [ ] RoleSeeder has executed: `php artisan db:seed --class=RoleSeeder`
- [ ] Cache cleared: `php artisan optimize:clear`
- [ ] Verify in Tinker: `Role::where('name', 'admin lppm')->first()->hasPermissionTo('module_arsip_data')`
- [ ] Test suite passes: `php artisan test` (142/142)
- [ ] Archive page accessible: `curl http://localhost/admin/archives` returns 200

---

## References

- **Spatie Laravel Permission:** https://spatie.be/docs/laravel-permission/v6/introduction
- **Route Middleware:** `routes/web.php:223`
- **Role Seeder:** `database/seeders/RoleSeeder.php`
- **Related Test:** `tests/Feature/Admin/ArchiveImportTest.php:23`

---

**Bug Fixed By:** GitHub Copilot Assistant  
**Verification Status:** ✅ All tests passing, no regressions
