<?php

namespace GivingTuesdayRo\GiveInitiatives\Upgrade;

use GivingTuesdayRo\GiveInitiatives\GiveInitiatives;
use GivingTuesdayRo\GiveInitiatives\Templates\PageTemplater;
use GivingTuesdayRo\GiveInitiatives\Upgrade\Migrations\AbstractMigration;
use GivingTuesdayRo\GiveInitiatives\Upgrade\Migrations\Migrate101_LocationDetails;

/**
 * Class UpgradeManager
 * @package GivingTuesdayRo\GiveInitiatives\Upgrade
 */
class UpgradeManager {


	protected static $versionNameVariable = 'give_initiatives_version';

	/**
	 * @var GiveInitiatives
	 */
	protected $plugin;

	protected $migrations = [
		Migrate101_LocationDetails::class
	];

	/**
	 * PageTemplater constructor.
	 *
	 * @param GiveInitiatives $plugin
	 */
	protected function __construct( GiveInitiatives $plugin ) {
		$this->plugin = $plugin;
		$this->boot();
	}

	/**
	 * @param GiveInitiatives $plugin
	 *
	 * @return PageTemplater
	 */
	static public function run( GiveInitiatives $plugin ) {
		$manager = new static( $plugin );

		return $manager;
	}

	protected function boot() {
		$this->registerVersionCheck();
	}

	protected function registerVersionCheck() {
		$this->plugin->getLoader()->addAction( 'plugins_loaded', $this, 'versionCheck' );
	}

	public function versionCheck() {
		$currentVersion = $this->plugin->getVersion();
		$dbVersion      = get_option( static::$versionNameVariable );

		// bail early if a new install
		if ( empty( $dbVersion ) ) {
			update_option( static::$versionNameVariable, $currentVersion );

			return;

		}
		// bail early if $dbVersion is >= $currentVersion
		if ( version_compare( $dbVersion, $currentVersion, '>=' ) ) {
			return;
		}

		$this->doUpgrade( $dbVersion );
	}

	/**
	 * @param $from
	 * @param $to
	 */
	protected function doUpgrade( $from ) {
		foreach ( $this->migrations as $migration ) {
			if ( call_user_func( [ $migration, 'shouldMigrate' ], $from ) == false ) {
				continue;
			}
			/** @var AbstractMigration $migration */
			$migration = new $migration( $this->plugin );
			$migration->migrate();
			update_option( static::$versionNameVariable, $from );
		}
	}
}
