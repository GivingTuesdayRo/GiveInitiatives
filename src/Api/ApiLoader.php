<?php

namespace GivingTuesdayRo\GiveInitiatives\Api;

use GivingTuesdayRo\GiveInitiatives\GiveInitiatives;

/**
 * Class ApiLoader
 * @package GivingTuesdayRo\GiveInitiatives\Api
 */
class ApiLoader {
	/**
	 * @var GiveInitiatives
	 */
	protected $plugin;

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

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
	 * @return self
	 */
	static public function run( GiveInitiatives $plugin ) {
		$self = new static( $plugin );

		return $self;
	}

	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	private function boot() {
		$this->registerActions();
	}

	protected function registerActions() {
		$this->plugin->getLoader()->addAction( 'rest_api_init', $this, 'registerApiHooks' );
	}

	public function registerApiHooks() {
		$controller = new InitiativesController();

		register_rest_route(
			$this->plugin->getName(), '/initiatives/(?P<limit>\d+)/(?P<compact>[0-1])',
			[
				'methods'  => 'GET',
				'callback' => [ $controller, 'index' ]
			]
		);

		register_rest_route(
			$this->plugin->getName(), '/initiatives/(?P<limit>\d+)',
			[
				'methods'  => 'GET',
				'callback' => [ $controller, 'index' ]
			]
		);

		register_rest_route(
			$this->plugin->getName(), '/initiatives',
			[
				'methods'  => 'GET',
				'callback' => [ $controller, 'index' ]
			]
		);
	}

}