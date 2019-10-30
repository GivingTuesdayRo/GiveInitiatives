<?php

namespace GivingTuesdayRo\GiveInitiatives\Upgrade\Migrations;

use GivingTuesdayRo\GiveInitiatives\GiveInitiatives;

/**
 * Class AbstractMigration
 * @package GivingTuesdayRo\GiveInitiatives\Upgrade\Migrations
 */
abstract class AbstractMigration {
	/**
	 * @var GiveInitiatives
	 */
	protected $plugin;

	public static  $version;

	/**
	 * AbstractMigration constructor.
	 *
	 * @param GiveInitiatives $plugin
	 */
	public function __construct( GiveInitiatives $plugin ) {
		$this->plugin = $plugin;
	}

	abstract public function migrate();

	/**
	 * @param $from
	 *
	 * @return bool|void
	 */
	public static function shouldMigrate($from)
	{
		// bail early if $dbVersion is >= $currentVersion
		if ( version_compare( $from, static::$version, '>=' ) ) {
			return false;
		}
		return true;
	}
}