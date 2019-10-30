<?php

namespace GivingTuesdayRo\GiveInitiatives\Frontend;

use GivingTuesdayRo\GiveInitiatives\GiveInitiatives;
use GivingTuesdayRo\GiveInitiatives\Templates\PageTemplater;
use function GiveInitiatives\Library\asset_path;

/**
 * Class FrontendLoader
 * @package GivingTuesdayRo\GiveInitiatives\Admin
 */
class FrontendLoader
{
	/**
	 * @var GiveInitiatives
	 */
	protected $plugin;
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
		$loader = new static( $plugin );

		return $loader;
	}

	protected function boot() {
		$this->assets();
		$this->addFilters();
	}

	/**
	 * @param \WP_Query $query
	 */
	public function filterInitiatives( $query ) {
		if ( $query->is_main_query() && ! is_admin() && is_post_type_archive( 'initiative' ) ) {

			// get original meta query
			$meta_query = $query->get( 'meta_query' );

			$meta_query = $meta_query ? $meta_query : [];

			if ( ! empty( $_GET['initiative-location'] ) ) {
				$locations = explode( ' ', $_GET['initiative-location'] );

				$locationQuery = [ 'relation' => 'OR' ];
				foreach ( $locations as $key => $location ) {
					$locationQuery[ 'location' . $key ] = [
						'key'     => 'givewp_initiative_options_initiative_county',
						'value'   => $location,
						'compare' => 'LIKE',
					];
				}
				$meta_query[] = $locationQuery;
			}

			// update the meta query args
			$query->set( 'meta_query', $meta_query );

			// always return
			return;
		}
	}

	protected function assets() {
//		wp_enqueue_script(
//			'givewp-frontend',
//			asset_path('/scripts/frontend.js'),
//			['jquery'],
//			null,
//			true
//		);
		wp_enqueue_style(
			'givewp-frontend',
			asset_path( '/styles/frontend.css' ),
			[],
			null,
			'all'
		);
	}

	protected function addFilters() {
		$this->plugin->getLoader()->addFilter( 'pre_get_posts', $this, 'filterInitiatives' );
	}
}