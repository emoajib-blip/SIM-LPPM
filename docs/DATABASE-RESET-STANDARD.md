# Database Reset Standard Procedure

**Version:** 1.0  
**Last Updated:** 15 Maret 2026  
**Status:** ✅ ACTIVE  

---

## Table of Contents

1. [Overview](#overview)
2. [Reset Types](#reset-types)
3. [Standard Reset Procedures](#standard-reset-procedures)
4. [Post-Reset Verification](#post-reset-verification)
5. [Troubleshooting](#troubleshooting)
6. [Safety Checklist](#safety-checklist)

---

## Overview

Database reset procedures are critical operations that must be performed consistently to ensure system integrity. This document defines **standardized procedures** for different reset scenarios and environments.

### Why Standardization Matters

The **Archives 403 error bug** (fixed 15 Maret 2026) occurred because:
- Database tables existed but **RoleSeeder was never executed**
- Role-permission bindings were missing
- Configuration was correct; initialization was incomplete

This document **prevents such incidents** by ensuring all reset operations follow a standard sequence.

### Environments

| Environment | Usage | Frequency | Data Preservation |
| --- | --- | --- | --- |
| **Local Development** | Individual developer machines | Daily (ad-hoc) | ❌ Discarded |
| **Testing** | Automated test suite | Per test run | ❌ Fresh each time |
| **Staging** | Pre-production validation | Per deployment | ⚠️ Partial (master data only) |
| **Production** | Live system | Never in normal ops | ✅ Always preserved |

---

## Reset Types

### Type 1: Fresh Setup (From Scratch)

**When:** Initial setup, new environment, complete data wipe  
**Data Loss:** ✅ TOTAL  
**Rollback:** Manual restoration from backup only

```bash
# Step 1: Clear everything
php artisan migrate:fresh

# Step 2: Run all seeders
php artisan db:seed

# Step 3: Clear caches
php artisan optimize:clear

# Expected Output
# ✅ Dropped all tables
# ✅ Created all tables from migrations
# ✅ Seeded 7 roles, 14 permissions, test data
# ✅ Caches cleared
```

**Use Cases:**
- 🔧 First-time installation
- 🧪 Test environment setup
- 🐛 Reproducing bugs with clean state
- 📊 Benchmarking performance

---

### Type 2: Fresh with Specific Seeder

**When:** Need to reset specific data but keep schema  
**Data Loss:** ⚠️ SELECTIVE  
**Best For:** Role/permission issues, master data refresh

```bash
# Option A: Just reset roles and permissions
php artisan db:seed --class=RoleSeeder

# Option B: Reset all master data
php artisan db:seed

# Option C: After manual schema changes
php artisan migrate:fresh
php artisan db:seed --class=RoleSeeder
```

**Use Cases:**
- ❌ Fix 403 errors (missing permissions)
- 🔑 Reset access control after changes
- 📋 Refresh master data (TKT levels, budget components, etc.)
- ⚡ Quick reset without full migration

---

### Type 3: Migrate Only (No Seeding)

**When:** Schema changes, but preserve existing data  
**Data Loss:** ❌ NONE (in normal case)  
**Best For:** Deployment, schema evolution

```bash
# Run pending migrations only
php artisan migrate

# Verify migration status
php artisan migrate:status

# Clear caches (permissions cache especially)
php artisan optimize:clear
php artisan cache:clear
```

**Use Cases:**
- 🚀 Production deployment
- 📦 Staging environment update
- 🔄 Adding new tables/columns to existing data
- 🛡️ Zero-downtime schema evolution

---

### Type 4: Full Refresh (Schema + Seeders)

**When:** Need clean data but want to test seeding process  
**Data Loss:** ✅ TOTAL  
**Best For:** QA, staging validation

```bash
# All-in-one command
php artisan migrate:fresh --seed

# Equivalent to:
# 1. php artisan migrate:fresh
# 2. php artisan db:seed
# 3. (combined transaction)
```

**Use Cases:**
- ✅ QA testing before deployment
- 🧪 Integration test setup
- 📝 Demo data preparation
- 🔍 Verify seeding logic works correctly

---

## Standard Reset Procedures

### Development Environment

**Frequency:** As needed (daily typical)  
**Data Preservation:** Not required  
**Typical Duration:** 5-10 seconds

```bash
#!/bin/bash
# Complete dev reset with full output

echo "🔄 Starting database reset..."
php artisan migrate:fresh --seed

echo "🧹 Clearing application cache..."
php artisan optimize:clear

echo "✅ Database reset complete!"

# Optional: Verify setup
php artisan tinker <<'EOF'
$roleCount = \App\Models\Role::count();
$permCount = \App\Models\Permission::count();
echo "✓ Roles: $roleCount\n";
echo "✓ Permissions: $permCount\n";
exit;
EOF
```

**Success Indicators:**
- ✅ No SQL errors in output
- ✅ Seeders completed without exceptions
- ✅ All files in `bootstrap/cache/` cleared
- ✅ 7 roles created
- ✅ 14 permissions created

---

### Testing Environment (Automated Tests)

**Frequency:** Before each test run  
**Data Preservation:** None (fresh per test)  
**Automatic:** Yes (via `phpunit.xml` / `pest.php`)

**Configuration** (`phpunit.xml`):

```xml
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
</env>
```

**What Happens Automatically:**
1. Each test run: In-memory SQLite database created
2. Before each test class: `migrate:fresh --seed` runs
3. After each test: Database destroyed
4. Permission cache: Cleared by `forgetCachedPermissions()` in `setUp()`

**Manual Test Database Reset:**

```bash
# If using file-based test database
rm database/database-test.sqlite
php artisan migrate --env=testing
php artisan db:seed --env=testing --class=RoleSeeder
```

---

### Staging Environment

**Frequency:** Per deployment cycle  
**Data Preservation:** ⚠️ PARTIAL (master data kept if possible)  
**Safety Level:** HIGH (requires approval)

```bash
#!/bin/bash
# Staging reset with safety checks

# 1. Backup current database
echo "📦 Backing up current database..."
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > backup-staging-$(date +%Y%m%d-%H%M%S).sql

# 2. Run migrations (new schema)
echo "📝 Running migrations..."
php artisan migrate --force

# 3. Optional: Reseed specific data
echo "🌱 Reseeding role/permission data..."
php artisan db:seed --class=RoleSeeder --force

# 4. Clear all caches
echo "🧹 Clearing caches..."
php artisan optimize:clear
php artisan cache:clear

# 5. Verify
echo "✅ Staging database reset complete"
php artisan migrate:status
```

**Safety Checklist Before Running:**
- [ ] Backup of production database exists
- [ ] Staging database is NOT the production database
- [ ] All developers notified (staging will be unavailable)
- [ ] New migrations tested locally first
- [ ] Seeder changes reviewed by team lead

---

### Production Environment

**⚠️ CRITICAL: Production reset should NEVER happen in normal operations**

**Permitted Scenarios Only:**
- 🆘 Catastrophic data corruption
- 🔓 Security breach requiring full wipe
- ⚖️ Legal requirement (GDPR, etc.)

**If Absolutely Necessary:**

```bash
#!/bin/bash
# ⚠️ PRODUCTION RESET - REQUIRES EXPLICIT AUTHORIZATION

# 1. BACKUP EVERYTHING
echo "🔐 CRITICAL BACKUP INITIATED"
mysqldump -u $PROD_USER -p$PROD_PASS $PROD_DB > \
  /secure/backup/production-$(date +%Y%m%d-%H%M%S).sql.gz

# 2. NOTIFY STAKEHOLDERS
echo "📢 Notifying administrators..."
# Send email/Slack notification

# 3. Maintenance mode
php artisan down --message="Emergency database recovery in progress"

# 4. Reset (POINT OF NO RETURN)
php artisan migrate:fresh --force
php artisan db:seed --force

# 5. Clear caches
php artisan optimize:clear

# 6. Resume operations
php artisan up

echo "✅ Production database reset complete"
```

**Requirements for Production Reset:**
1. ✅ CEO/CTO written authorization
2. ✅ Full database backup stored offsite
3. ✅ Rollback procedure documented
4. ✅ Incident commander assigned
5. ✅ Communication plan executed
6. ✅ Audit log of all steps

---

## Post-Reset Verification

### Verification Checklist

After ANY database reset, verify these items:

```bash
#!/bin/bash
# Post-reset verification script

echo "📋 POST-RESET VERIFICATION"
echo "================================"

# 1. Migration status
echo -e "\n1️⃣  Migration Status:"
php artisan migrate:status

# 2. Role count
echo -e "\n2️⃣  Roles Created:"
php artisan tinker <<'EOF'
$count = \App\Models\Role::count();
echo "Total roles: $count (expected: 7)\n";
if ($count !== 7) die("❌ FAILED: Incorrect role count\n");
echo "✅ PASS\n";
exit;
EOF

# 3. Permission count
echo -e "\n3️⃣  Permissions Created:"
php artisan tinker <<'EOF'
$count = \App\Models\Permission::count();
echo "Total permissions: $count (expected: 14)\n";
if ($count !== 14) die("❌ FAILED: Incorrect permission count\n");
echo "✅ PASS\n";
exit;
EOF

# 4. Admin LPPM permissions
echo -e "\n4️⃣  Admin LPPM Permissions:"
php artisan tinker <<'EOF'
$role = \App\Models\Role::where('name', 'admin lppm')->first();
$permissions = $role->getPermissionNames();
echo "Admin LPPM has " . $permissions->count() . " permissions\n";
if ($permissions->contains('module_arsip_data')) {
    echo "✅ PASS: module_arsip_data present\n";
} else {
    die("❌ FAILED: module_arsip_data missing\n");
}
exit;
EOF

# 5. Cache status
echo -e "\n5️⃣  Cache Status:"
php artisan cache:clear
echo "✅ Caches cleared"

# 6. Run tests
echo -e "\n6️⃣  Test Suite:"
php artisan test --minimal

echo -e "\n================================"
echo "✅ All verifications passed!"
```

### Verification Output (Expected)

```
📋 POST-RESET VERIFICATION
================================

1️⃣  Migration Status:
Ran: 2026_03_15_000001_create_document_signatures_table

2️⃣  Roles Created:
Total roles: 7 (expected: 7)
✅ PASS

3️⃣  Permissions Created:
Total permissions: 14 (expected: 14)
✅ PASS

4️⃣  Admin LPPM Permissions:
Admin LPPM has 11 permissions
✅ PASS: module_arsip_data present

5️⃣  Cache Status:
✅ Caches cleared

6️⃣  Test Suite:
Tests: 142 passed

================================
✅ All verifications passed!
```

---

## Troubleshooting

### Problem: "SQLSTATE[42S02]: Table doesn't exist"

**Cause:** Migration didn't run completely  
**Solution:**

```bash
# Clear failed state
php artisan migrate:reset
php artisan migrate:refresh

# Or complete fresh start
php artisan migrate:fresh
```

---

### Problem: "User does not have the right permissions" (403 errors)

**Cause:** RoleSeeder didn't run, or cache not cleared  
**Solution:**

```bash
# Step 1: Run RoleSeeder
php artisan db:seed --class=RoleSeeder

# Step 2: Clear permission cache
php artisan cache:clear
php artisan optimize:clear

# Step 3: Verify
php artisan tinker <<'EOF'
$role = \App\Models\Role::where('name', 'admin lppm')->first();
echo "Has module_arsip_data: " . ($role->hasPermissionTo('module_arsip_data') ? 'YES' : 'NO');
exit;
EOF
```

---

### Problem: "Seeder returned with errors"

**Cause:** Likely duplicate role/permission or constraint violation  
**Solution:**

```bash
# Option 1: Check for duplicates
php artisan tinker <<'EOF'
$dupes = \App\Models\Role::groupBy('name')->havingRaw('count(*) > 1')->get();
if ($dupes->count()) {
    echo "Duplicate roles found:\n";
    dump($dupes);
} else {
    echo "No duplicates\n";
}
exit;
EOF

# Option 2: Delete old data and reseed
php artisan migrate:refresh --seed
```

---

### Problem: "Permission cache still stale after reset"

**Cause:** Laravel cache driver still has old data  
**Solution:**

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Or nuclear option: clear all
php artisan optimize:clear

# Restart queue if using it
php artisan queue:restart
```

---

## Safety Checklist

**BEFORE running ANY reset (especially production):**

- [ ] **Backup exists** - Database backed up in last 24 hours
- [ ] **Off-site copy** - Backup stored outside current server
- [ ] **Environment confirmed** - Verified target environment (dev/test/staging/prod)
- [ ] **Stakeholders notified** - Relevant people know about reset
- [ ] **Maintenance window** - Scheduled during low-traffic time
- [ ] **Rollback plan** - Know how to restore from backup
- [ ] **Testing scheduled** - Post-reset verification tests ready
- [ ] **Code reviewed** - Any new migrations reviewed by senior dev
- [ ] **Change log** - Document why reset is being done
- [ ] **Audit trail** - Enable logging of all operations

---

## Related Documentation

| Document | Purpose |
| --- | --- |
| `BUG-FIX-ARCHIVES-403-ERROR.md` | Why RoleSeeder matters |
| `BUG-FIX-RBAC-MATRIX-500-ERROR.md` | TKT Manager null handling |
| `production-setup.md` | Production infrastructure |
| `database/seeders/RoleSeeder.php` | Role/permission mapping |

---

## Summary Table

| Reset Type | Command | Duration | Data Loss | Environment | Frequency |
| --- | --- | --- | --- | --- | --- |
| **Fresh Setup** | `migrate:fresh --seed` | 10s | Total | Dev/Test | Ad-hoc |
| **Role Reset** | `db:seed --class=RoleSeeder` | 2s | Partial | Any | Fix permissions |
| **Migrations Only** | `migrate` | 5s | None | Staging/Prod | Deployments |
| **Full Refresh** | `migrate:fresh --seed` | 10s | Total | Test/Staging | QA cycles |

---

**Version:** 1.0  
**Last Reviewed:** 15 Maret 2026  
**Next Review:** 30 Juni 2026  

> **"A standard reset procedure prevents initialization bugs before they occur."**
