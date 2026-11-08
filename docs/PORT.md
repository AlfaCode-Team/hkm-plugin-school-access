# Port status — `school.access`

**Nothing is ported yet. This plugin is a scaffold.**

It declares its domain, its dependencies and an empty published
contract, so a consumer can already name `school.access` in its
`requires[]` and the boot will accept it. It cannot yet *do* anything:
`Provider::register()` binds no service, and `SchoolAccessContract` has no
methods, so resolving it from a module container throws.

## What has to be ported

| | |
|---|---|
| Legacy source | `login_setups.php, verify_*_pin.php, account_links.php, account_switch.php, sa_impersonation_banner.php, approvals, *_permissions` |
| Legacy tables | `approvals, staff_permissions, administratif_permissions, account_links` |

Those tables are part of the ~50 that have **no DDL anywhere** in the
legacy tree — it was built by hand against a live database. The schema
has to be reconstructed from the queries that read it before any
repository here can be written. That protocol is PORT-PLAN.md §8.

## Order of work

1. Reconstruct the tables above into `database/migrations/` (LetMigrate).
2. Transcribe the pure algorithms from the legacy source into `Domain/`.
3. Add ONE method to `SchoolAccessContract` per use case the outside world needs.
4. Implement it in `Application/Services/`, reading through a repository
   bound with `bindInternal()`.
5. Declare routes in `module.json` — never in PHP.
6. Bind the contract in `Provider::register()`.

Each step is gated: a method is not ported until a test covers it.

## Depends on

- `database.management`
- `crypto.services`
- `auth.identity`
- `user.management`
- `authorization.policy`
- `audit.trail`
- `school.directory`

These are module **domains**. An unknown domain fails the boot.

## The plan this follows

`PORT-PLAN.md` (phases, invariants, schema protocol) and
`PLUGIN-PLAN.md` (the 29-plugin split) in the **ElimuSystem**
repository. Not public.
