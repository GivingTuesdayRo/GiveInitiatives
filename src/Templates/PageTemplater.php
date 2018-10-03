<?php

namespace GivingTuesdayRo\GiveInitiatives\Templates;

use GivingTuesdayRo\GiveInitiatives\GiveInitiatives;

/**
 * Class PageTemplater
 * @package GivingTuesdayRo\GiveInitiatives\Templates
 */
class PageTemplater
{
    /**
     * @var GiveInitiatives
     */
    protected $plugin;

    /**
     * A reference to an instance of this class.
     */
    private static $instance;


    /**
     * The array of templates that this plugin tracks.
     */
    protected $templates;

    /**
     * PageTemplater constructor.
     * @param GiveInitiatives $plugin
     */
    protected function __construct(GiveInitiatives $plugin)
    {
        $this->plugin = $plugin;
        $this->boot();
    }

    /**
     * @param GiveInitiatives $plugin
     * @return PageTemplater
     */
    static public function run(GiveInitiatives $plugin)
    {
        $templater = new static($plugin);

        return $templater;
    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    private function boot()
    {
        // Add your templates to this array.
        $this->templates = [
            'templates-post.php' => 'Initiative Post',
        ];
        $this->registerFilters();
    }

    protected function registerFilters()
    {
        $this->plugin->getLoader()->addFilter('theme_page_templates', $this, 'addNewTemplate');

        // Add a filter to the save post to inject out template into the page cache
        $this->plugin->getLoader()->addFilter('wp_insert_post_data', $this, 'register_project_templates');

        // Add a filter to the template include to determine if the page has our
        // template assigned and return it's path
        $this->plugin->getLoader()->addFilter('template_include', $this, 'view_project_template');
    }

    /**
     * Adds our template to the page dropdown for v4.7+
     * @param $postTemplates
     * @return array
     */
    public function addNewTemplate($postTemplates)
    {
        $postTemplates = array_merge($postTemplates, $this->templates);

        return $postTemplates;
    }

    /**
     * Adds our template to the pages cache in order to trick WordPress
     * into thinking the template file exists where it doens't really exist.
     */
    public function register_project_templates($atts)
    {
        // Create the key used for the themes cache
        $cache_key = 'page_templates-'.md5(get_theme_root().'/'.get_stylesheet());
        // Retrieve the cache list.
        // If it doesn't exist, or it's empty prepare an array
        $templates = wp_get_theme()->get_page_templates();
        if (empty($templates)) {
            $templates = [];
        }
        // New cache, therefore remove the old one
        wp_cache_delete($cache_key, 'themes');

        // Now add our template to the list of templates by merging our templates
        // with the existing templates array from the cache.
        $templates = array_merge($templates, $this->templates);

        // Add the modified cache to allow WordPress to pick it up for listing
        // available templates
        wp_cache_add($cache_key, $templates, 'themes', 1800);

        return $atts;
    }

    /**
     * Checks if the template is assigned to the page
     */
    public function view_project_template($template)
    {
        // Return the search template if we're searching (instead of the template for the first result)
        if (is_search()) {
            return $template;
        }

        // Get global post
        global $post;

        // Return template if post is empty
        if (!$post) {
            return $template;
        }
        // Return default template if we don't have a custom one defined
        if (!isset($this->templates[get_post_meta(
                $post->ID, '_wp_page_template', true
            )])) {
            return $template;
        }
        // Allows filtering of file path
        $filepath = GIVE_INITIATIVES_SRC;
        $file = $filepath
            .'\Frontend\views\\'
            .get_post_meta(
                $post->ID, '_wp_page_template', true
            );
        // Just to be safe, we check if the file exist first
        if (file_exists($file)) {
            return $file;
        } else {
            echo $file;
        }

        // Return template
        return $template;
    }

}