# RBAC Matrix Quick Reference

**Page URL:** `http://localhost:8000/settings/master-data?group=academic-content&tab=rbac-matrix`  
**Component:** `app/Livewire/Settings/RolePermissionMatrix.php`  
**Last Updated:** 15 Maret 2026

---

## Overview

The RBAC (Role-Based Access Control) Matrix is an interactive interface for managing role-permission mappings in the system. It provides:

- ✅ Visual matrix of 7 roles × 14 permissions
- ✅ Toggle permissions on/off with instant UI feedback
- ✅ Safety rules preventing deletion of core admin permissions
- ✅ Atomic transactions ensuring data consistency
- ✅ Automatic permission cache clearing on save

---

## Access Control

**Who Can Access This Page?**

```
✅ superadmin  - Full access
✅ admin lppm  - Full access
❌ kepala lppm - No access (role-restricted)
❌ dekan       - No access
❌ dosen       - No access
❌ reviewer    - No access
```

**Route Definition** (in `routes/web.php:216`):

```php
Route::get('settings/master-data', MasterData::class)
    ->middleware(['role:admin lppm|superadmin'])
    ->name('settings.master-data');
```

---

## The Matrix Layout

### Rows: 7 Roles

| # | Role Name | Description | Users |
| --- | --- | --- | --- |
| 1 | `admin lppm` | Admin staff, settings management | 1-2 per institution |
| 2 | `kepala lppm` | LPPM Director, final decisions | 1 per institution |
| 3 | `dekan` | Faculty deans, first approval | Multiple |
| 4 | `dosen` | Lecturers, submit proposals | Majority |
| 5 | `rektor` | University rector, oversight | 1 per institution |
| 6 | `reviewer` | Expert evaluators | 10-20 per year |
| 7 | `superadmin` | IT/Developers | IT staff only |

### Columns: 14 Permissions

| # | Permission | Description | Roles | Required |
| --- | --- | --- | --- | --- |
| 1 | `module_penelitian` | Research management | dosen, dekan, admin lppm, reviewer, kepala lppm, rektor | ✅ Yes |
| 2 | `module_pengabdian` | Community service mgmt | dosen, dekan, admin lppm, reviewer, kepala lppm, rektor | ✅ Yes |
| 3 | `module_rekognisi` | Recognition/policy | dosen | ⚠️ Limited |
| 4 | `module_persetujuan_dekan` | Dean approval | dekan | ✅ Yes |
| 5 | `module_persetujuan_awal` | Initial approval | kepala lppm | ✅ Yes |
| 6 | `module_persetujuan_akhir` | Final approval | kepala lppm | ✅ Yes |
| 7 | `module_reviewer_management` | Reviewer assignment | admin lppm | ✅ Yes |
| 8 | `module_monev` | Monitoring/evaluation | admin lppm | ✅ Yes |
| 9 | `module_review` | Review access | reviewer, admin lppm | ✅ Yes |
| 10 | `module_laporan` | Reports viewing | admin lppm, rektor, kepala lppm | ✅ Yes |
| 11 | `module_iku` | Accreditation/IKU | admin lppm, rektor, kepala lppm, dekan | ✅ Yes |
| 12 | `module_kelola_pengguna` | User management | admin lppm | 🔒 LOCKED |
| 13 | `module_arsip_data` | Archive management | admin lppm | 🔒 LOCKED |
| 14 | `module_pengaturan` | Settings access | admin lppm | 🔒 LOCKED |

**Legend:**
- ✅ **Required:** Essential permissions
- ⚠️ **Limited:** Single role only
- 🔒 **Locked:** Cannot be toggled (safety rule)

---

## Features

### 1. Toggle Permissions

**How It Works:**
1. Click any cell in the matrix
2. Checkbox toggles instantly (UI only)
3. No changes saved until you click "Save"

**Visual Feedback:**
- ✅ Checked = Role has permission
- ⬜ Unchecked = Role doesn't have permission
- 🔒 Locked = Cannot be changed (safety rule)

---

### 2. Safety Rules

The system **prevents dangerous changes** automatically:

```php
// From RolePermissionMatrix.php line 77-86
if (
    in_array($role->name, ['admin lppm', 'superadmin']) &&
    in_array($permission->name, ['module_pengaturan', 'module_kelola_pengguna'])
) {
    $this->toastWarning('Hak akses dasar Administrator tidak dapat dicabut.', 'Keamanan');
    $this->matrix[$roleId][$permissionId] = true;
    return;
}
```

**Protected Combinations:**
- 🔒 admin lppm + `module_pengaturan` = LOCKED
- 🔒 admin lppm + `module_kelola_pengguna` = LOCKED
- 🔒 superadmin + `module_pengaturan` = LOCKED
- 🔒 superadmin + `module_kelola_pengguna` = LOCKED

**Why:** If admin users lose settings/user management access, they can't regain it!

---

### 3. Save Changes

**Button:** "Simpan Perubahan Hak Akses"

**What Happens:**
1. Transaction starts
2. For each role: `role->permissions()->sync($newPermissionIds)`
3. Permission cache cleared: `forgetCachedPermissions()`
4. Success toast shown
5. Changes take effect immediately

**Atomic Guarantee:**
```php
DB::transaction(function () use (&$updatedCount) {
    foreach ($this->matrix as $roleId => $permissions) {
        $role->permissions()->sync($allowedPermissionIds);
    }
});
```

Either **all roles update** or **none update** (no partial saves).

---

### 4. Reset/Discard Changes

**Button:** "Muat Ulang dari Database"

**What It Does:**
1. Reloads matrix from database
2. Discards all unsaved UI changes
3. Shows toast notification

**Use When:**
- You made mistakes and want to start over
- You want to see the latest DB state
- You accidentally toggled something

---

## Common Workflows

### Workflow 1: Add Permission to Existing Role

**Scenario:** Need to give `dosen` role access to `module_laporan` (reports)

**Steps:**
1. Find row "dosen", column "module_laporan"
2. Click cell → toggles to ✅
3. Click "Simpan Perubahan Hak Akses"
4. Verify dosen users can now access reports

**Verification:**
```bash
php artisan tinker <<'EOF'
$role = \App\Models\Role::where('name', 'dosen')->first();
echo $role->hasPermissionTo('module_laporan') ? '✅ YES' : '❌ NO';
exit;
EOF
```

---

### Workflow 2: Create New Role (Manual)

**Scenario:** Need to add a new role "auditor"

**Note:** The matrix is READ/WRITE for existing roles only. To add new roles:

```bash
# 1. Add to RoleSeeder.php
$roles = [
    'superadmin',
    'admin lppm',
    'auditor',  // <- NEW
    // ...
];

# 2. Run seeder
php artisan db:seed --class=RoleSeeder

# 3. RBAC Matrix automatically includes new role
```

---

### Workflow 3: Fix Permission Issues (403 Errors)

**Scenario:** User gets "403 Forbidden" on page they should access

**Diagnosis:**
1. Go to RBAC Matrix
2. Check if user's role has required permission
3. Example: 403 on `/admin/archives` means check admin lppm + `module_arsip_data`

**Fix Options:**

**Option A: Toggle in UI (Recommended)**
1. Click the cell
2. Save
3. Permission takes effect immediately

**Option B: Direct CLI**
```bash
php artisan db:seed --class=RoleSeeder
php artisan cache:clear
```

---

## Data Model

### Database Schema

```sql
-- Pivot table (role_has_permissions)
CREATE TABLE role_has_permissions (
    permission_id uuid NOT NULL,
    role_id uuid NOT NULL,
    PRIMARY KEY (permission_id, role_id),
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
);
```

### Component Properties

```php
public $roleList;          // Collection of Role models
public $permissionList;    // Collection of Permission models
public $matrix = [];       // 2D array: [role_id][permission_id] => boolean
```

**Matrix Structure:**
```php
$matrix = [
    'role-uuid-1' => [
        'perm-uuid-1' => true,   // Role 1 has Permission 1
        'perm-uuid-2' => false,  // Role 1 doesn't have Permission 2
    ],
    'role-uuid-2' => [
        'perm-uuid-1' => true,
        'perm-uuid-2' => true,
    ],
];
```

---

## Troubleshooting

### Issue: Changes Don't Take Effect After Save

**Cause:** Permission cache still old  
**Solution:**

```bash
# Manual cache clear
php artisan cache:clear
php artisan optimize:clear

# Or refresh browser + logout/login
```

---

### Issue: "Hak akses dasar Administrator tidak dapat dicabut"

**This is a SAFETY feature**, not a bug!

**Meaning:** You tried to remove `module_pengaturan` from admin

**Why:** If you do this, admin loses access to the settings page itself and **can't change it back**

**Workaround:** Contact superadmin to make changes via code

---

### Issue: Matrix Shows Old Permissions

**Cause:** Database not synced with code  
**Solution:**

```bash
# Reseed the base roles
php artisan db:seed --class=RoleSeeder

# Refresh page
# [F5] in browser
```

---

### Issue: New Role Doesn't Appear in Matrix

**Cause:** Not added to RoleSeeder  
**Solution:**

1. Edit `database/seeders/RoleSeeder.php`
2. Add role name to `$roles` array
3. Run `php artisan db:seed --class=RoleSeeder`
4. Refresh page

---

## Important Notes

### ⚠️ Critical Dependencies

The RBAC Matrix depends on:

| Component | File | Impact |
| --- | --- | --- |
| RoleSeeder | `database/seeders/RoleSeeder.php` | Initial data |
| Spatie Cache | `vendor/spatie/laravel-permission` | Permission lookup |
| Auth Middleware | `bootstrap/app.php` | Route protection |

If any fail → 403 errors system-wide

---

### 🔐 Security Assumptions

1. **Only superadmin/admin lppm can access** this page
2. **All changes are atomic** (transaction-based)
3. **Permission cache cleared on save** (prevents stale cache)
4. **Safety rules prevent account lockout** (locked permissions)

---

## Related Files

| File | Purpose |
| --- | --- |
| `app/Livewire/Settings/RolePermissionMatrix.php` | Component logic |
| `resources/views/livewire/settings/role-permission-matrix.blade.php` | UI template |
| `database/seeders/RoleSeeder.php` | Role/permission defaults |
| `docs/BUG-FIX-ARCHIVES-403-ERROR.md` | Why seeding matters |
| `docs/DATABASE-RESET-STANDARD.md` | Reset procedures |

---

## Quick Commands

```bash
# View current role-permission state
php artisan tinker <<'EOF'
\App\Models\Role::with('permissions')->get()->each(function($role) {
    echo "{$role->name}: " . implode(', ', $role->getPermissionNames()->toArray()) . "\n";
});
exit;
EOF

# Fix missing permissions (if 403 errors)
php artisan db:seed --class=RoleSeeder
php artisan cache:clear

# Verify admin lppm has module_arsip_data (archives fix)
php artisan tinker <<'EOF'
$role = \App\Models\Role::where('name', 'admin lppm')->first();
echo "Has module_arsip_data: " . ($role->hasPermissionTo('module_arsip_data') ? '✅ YES' : '❌ NO');
exit;
EOF

# Test entire permission system
php artisan test --filter=RolePermission
```

---

**Last Updated:** 15 Maret 2026  
**Maintained By:** Development Team  
**Status:** ✅ Active & Tested
