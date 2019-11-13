<?php

namespace GivingTuesdayRo\GiveInitiatives;

use GivingTuesdayRo\GiveInitiatives\Admin\AdminLoader;
use GivingTuesdayRo\GiveInitiatives\Api\ApiLoader;
use GivingTuesdayRo\GiveInitiatives\Frontend\FrontendLoader;
use GivingTuesdayRo\GiveInitiatives\Hooks\Activation;
use GivingTuesdayRo\GiveInitiatives\Hooks\Deactivation;
use GivingTuesdayRo\GiveInitiatives\Loader\PluginLoader;
use GivingTuesdayRo\GiveInitiatives\Taxonomies\Initiatives;
use GivingTuesdayRo\GiveInitiatives\Templates\PageTemplater;
use GivingTuesdayRo\GiveInitiatives\Upgrade\UpgradeManager;

/**
 * Class GiveInitiatives
 * @package GivingTuesdayRo\GiveInitiatives
 */
class GiveInitiatives {

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $name The string used to uniquely identify this plugin.
	 */
	protected $name;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      PluginLoader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * GiveInitiatives constructor.
	 */
	public function __construct() {
		$this->boot();
	}


	static public function run() {
		$plugin = new self();
		$plugin->boot();
		$plugin->getLoader()->run();
	}

	public function boot() {
		$this->bootVariables();
		$this->defineInternationalization();
		$this->loadDependencies();
		$this->defineTaxonomies();
		$this->defineAdmin();
		$this->defineTemplates();
		$this->defineFrontend();
		$this->defineHooks();
//        $this->define_admin_hooks();
		$this->defineUpgradeActions();
		$this->defineApi();
	}

	protected function bootVariables() {
		if ( defined( 'GIVE_INITIATIVES_VERSION' ) ) {
			$this->setVersion( GIVE_INITIATIVES_VERSION );
		} else {
			$this->setVersion( '1.0.0' );
		}

		$this->setName( 'give-initiatives' );

		if ( ! defined( 'GIVE_INITIATIVES_SRC' ) ) {
			define( 'GIVE_INITIATIVES_SRC', __DIR__ );
		}
		if ( ! defined( 'GIVE_INITIATIVES_TEXT_DOMAIN' ) ) {
			define( 'GIVE_INITIATIVES_TEXT_DOMAIN', 'give' );
		}
	}

	protected function defineHooks() {
		register_activation_hook( __DIR__ . '/Hooks/Activation.php', [ Activation::class, 'run' ] );
		register_deactivation_hook( __DIR__ . '/Hooks/Deactivation.php', [ Deactivation::class, 'run' ] );
	}

	protected function loadDependencies() {
		$this->setLoader( new PluginLoader() );
	}

	protected function defineTaxonomies() {
		$initiatives = new Initiatives();
		$initiatives->register();
	}

	protected function defineAdmin() {
		$initiatives = new AdminLoader();
		$initiatives->run();
	}

	protected function defineFrontend() {
		FrontendLoader::run( $this );
	}

	protected function defineApi() {
		ApiLoader::run( $this );
	}

	protected function defineInternationalization() {
		load_plugin_textdomain( GIVE_INITIATIVES_TEXT_DOMAIN, false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );
	}

	protected function defineUpgradeActions() {
		UpgradeManager::run( $this );

	}

	protected function defineTemplates() {
		PageTemplater::run( $this );
	}

	/**
	 * @return string
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 * @param string $version
	 */
	public function setVersion( $version ) {
		$this->version = $version;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return PluginLoader
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * @param PluginLoader $loader
     */
    public function setLoader($loader)
    {
        $this->loader = $loader;
    }
}
