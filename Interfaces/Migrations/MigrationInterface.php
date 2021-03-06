<?php
namespace Electro\Interfaces\Migrations;

/**
 * A class that implements a single migration.
 */
interface MigrationInterface
{
  /**
   * Reverses the migration.
   */
  function down ();

  /**
   * Returns the SQL queries generated by the `down()` method.
   *
   * @return string[]
   */
  function getDownQueries ();

  /**
   * Returns the SQL queries generated by the `up()` method.
   *
   * @return string[]
   */
  function getUpQueries ();

  /**
   * Checks if the output is muted (disabled).
   *
   * @return bool
   */
  function isMuted ();

  /**
   * @param bool $muted [optional] true (or ommitted) to mute (disable) the output, false to unmute it.
   */
  function mute ($muted = true);

  /**
   * Performs the migration.
   */
  function up ();

}
