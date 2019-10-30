<?php

namespace GivingTuesdayRo\GiveInitiatives\Upgrade\Migrations;

/**
 * Class Migrate101_LocationDetails
 * @package GivingTuesdayRo\GiveInitiatives\Upgrade\Migrations
 */
class Migrate101_LocationDetails extends AbstractMigration {
	public static $version = '1.0.1';

	public function migrate() {
		global $wpdb;

		$querystr = $wpdb->prepare(
			"UPDATE $wpdb->postmeta SET meta_key = '%s' WHERE meta_key = '%s'",
			'givewp_initiatives_options_initiative_address',
			'givewp_initiatives_options_initiative_location'
		);
		$wpdb->get_results( $querystr );

		$querystr = $wpdb->prepare(
			"UPDATE $wpdb->postmeta SET meta_key = '%s' WHERE meta_key = '%s'",
			'givewp_initiative_organization_organization_name',
			'givewp_initiative_options_organization_name'
		);
		$wpdb->get_results( $querystr );
	}
}