<?php
namespace Electro\Interfaces;

use Electro\Interop\MigrationInfo;

interface MigrationsInterface
{
  /**
   * Runs all pending migrations of a module, optionally up to a specific version.
   *
   * @param string $moduleName The target module (vendor-name/package-name syntax).
   * @param string $target     [optional] The version number to migrate to.
   */
  function migrate ($moduleName, $target = null);

  /**
   * Rollback all database migrations.
   *
   * @param string $moduleName The target module (vendor-name/package-name syntax).
   */
  function reset ($moduleName);

  /**
   * Reverts the last migration of a specific module, or optionally up to a specific version or date.
   *
   * @param string $moduleName The target module (vendor-name/package-name syntax).
   * @param string $target     [optional] The version number to migrate to.
   * @param string $date       [optional] The date to rollback to.
   */
  function rollback ($moduleName, $target = null, $date = null);

  /**
   * Runs all available seeders of a specific module, or just a specific seeder.
   *
   * @param string $moduleName The target module (vendor-name/package-name syntax).
   * @param string $seeder     [optional] The name of the seeder (in camel case).
   */
  function seed ($moduleName, $seeder = null);

  /**
   * Gets a list of all migrations of a specific module, along with their current status.
   * <p>This can also be used to determine if a module has any migrations at all.
   *
   * @param string $moduleName  The target module (vendor-name/package-name syntax).
   * @param bool   $onlyPending [optional] If true, only pending migrations will be returned.
   * @return MigrationInfo
   */
  function status ($moduleName, $onlyPending = false);

}
