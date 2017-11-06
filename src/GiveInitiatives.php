<?php

namespace GivingTuesdayRo\GiveInitiatives;

use GivingTuesdayRo\GiveInitiatives\Hooks\Activation;
use GivingTuesdayRo\GiveInitiatives\Hooks\Deactivation;

class GiveInitiatives
{

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Plugin_Name_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    public function __construct()
    {
        $this->boot();
    }


    static public function run()
    {
        $plugin = new self();
        $plugin->boot();
    }

    public function boot()
    {
        if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
            $this->version = PLUGIN_NAME_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'plugin-name';
        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    protected function registerActivations()
    {
        register_activation_hook(__DIR__.'/Hooks/Activation.php',[Activation::class, 'run']);
        register_deactivation_hook( __DIR__.'/Hooks/Deactivation.php',[Deactivation::class, 'run']);
    }
}