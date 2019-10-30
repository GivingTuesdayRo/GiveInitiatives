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
	}



	public function assets()
	{
//		wp_enqueue_script(
//			'givewp-frontend',
//			asset_path('/scripts/frontend.js'),
//			['jquery'],
//			null,
//			true
//		);
		wp_enqueue_style(
			'givewp-frontend',
			asset_path('/styles/frontend.css'),
			[],
			null,
			'all'
		);
	}
}