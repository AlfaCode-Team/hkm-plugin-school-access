# hkm-plugin-school-access

> Solves **`school.access`** · namespace **`Plugins\SchoolAccess\`** · on-demand GDA module
> Family: Elimu / school domain

Collapses the 13 legacy session identities into one Identity: role mapping, area PIN gates, super-admin impersonation and account linking.

## Status

**Scaffold.** The domain is declared and the contract is published, but no use
case is implemented yet. `SchoolAccessContract` is deliberately empty — methods are added
one per ported use case.

## Where it comes from

| | |
|---|---|
| Legacy source | `login_setups.php, verify_*_pin.php, account_links.php, account_switch.php, sa_impersonation_banner.php, approvals, *_permissions` |
| Legacy tables | `approvals, staff_permissions, administratif_permissions, account_links` |

The port plan, the reconstructed domain model and the per-plugin recipe live in
the **ElimuSystem** repository: `PORT-PLAN.md` and `PLUGIN-PLAN.md`.

## Requires

- `database.management`
- `crypto.services`
- `auth.identity`
- `user.management`
- `authorization.policy`
- `audit.trail`
- `school.directory`

Declared as module **domains**, never port or contract class names. An unknown
domain fails the boot.

## Using it

```jsonc
// the consumer's module.json / proj.json
{ "requires": ["school.access"] }
```

```php
$svc = $container->make(\Plugins\SchoolAccess\API\Contracts\SchoolAccessContract::class);
```

## Installing

```bash
hkm plugins enable SchoolAccess <project>
```
