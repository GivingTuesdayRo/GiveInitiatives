<?php

namespace GivingTuesdayRo\GiveInitiatives;

use GivingTuesdayRo\GiveInitiatives\Admin\AdminLoader;
use GivingTuesdayRo\GiveInitiatives\Hooks\Activation;
use GivingTuesdayRo\GiveInitiatives\Hooks\Deactivation;
use GivingTuesdayRo\GiveInitiatives\Loader\PluginLoader;
use GivingTuesdayRo\GiveInitiatives\Taxonomies\Initiatives;

/**
 * Class GiveInitiatives
 * @package GivingTuesdayRo\GiveInitiatives
 */
class GiveInitiatives
{

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
    public function __construct()
    {
        $this->boot();
    }


    static public function run()
    {
        $plugin = new self();
        $plugin->boot();
        $plugin->getLoader()->run();
    }

    public function boot()
    {
        $this->bootVariables();
        $this->loadDependencies();
        $this->defineTaxonomies();
        $this->defineAdmin();
//        $this->set_locale();
//        $this->define_admin_hooks();
//        $this->define_public_hooks();
    }

    protected function bootVariables()
    {
        if (defined('GIVE_INITIATIVES_VERSION')) {
            $this->setVersion(GIVE_INITIATIVES_VERSION);
        } else {
            $this->setVersion('1.0.0');
        }
        $this->setName('give-initiatives');
    }

    protected function registerActivations()
    {
        register_activation_hook(__DIR__.'/Hooks/Activation.php', [Activation::class, 'run']);
        register_deactivation_hook(__DIR__.'/Hooks/Deactivation.php', [Deactivation::class, 'run']);
    }

    protected function loadDependencies()
    {
        $this->setLoader(new PluginLoader());
    }

    protected function defineTaxonomies()
    {
        $initiatives = new Initiatives();
        $initiatives->register();
    }

    protected function defineAdmin()
    {
        $initiatives = new AdminLoader();
        $initiatives->run();
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getName()
    {
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