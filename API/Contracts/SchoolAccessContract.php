<?php

declare(strict_types=1);

namespace Plugins\SchoolAccess\API\Contracts;

/**
 * Published contract for `school.access`.
 *
 * Collapses the 13 legacy session identities into one Identity: role mapping, area PIN gates, super-admin impersonation and account linking.
 *
 * Legacy source : login_setups.php, verify_*_pin.php, account_links.php, account_switch.php, sa_impersonation_banner.php, approvals, *_permissions
 * Legacy tables : approvals, staff_permissions, administratif_permissions, account_links
 *
 * Consumers declare `"requires": ["school.access"]` and resolve THIS interface.
 * Nothing outside this plugin may touch its internals — those are bound with
 * `bindInternal()` and throw `ScopeViolationException` cross-scope.
 *
 * @see docs/PORT.md in this repository for what still has to be ported.
 */
interface SchoolAccessContract
{
    // Methods are added as each legacy use case is ported. Keep this surface
    // minimal: one method per use case the OUTSIDE world needs, never a
    // pass-through to a repository.
}
