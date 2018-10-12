<?php

namespace GivingTuesdayRo\GiveInitiatives\Taxonomies;

use PostTypes\PostType;
use PostTypes\Taxonomy;

/**
 * Class Initiatives
 * @package GivingTuesdayRo\GiveInitiatives\Taxonomies
 */
class Initiatives extends AbstractTaxonomy
{

    protected function defineTaxonomy()
    {
        $initiatives = new PostType('initiative',
            ['supports' => ['title', 'editor', 'thumbnail', 'tags']]);

        // Add the genre taxonomy to the book post type
        $initiatives->taxonomy('Campaign Year');
        $initiatives->taxonomy('Initiator Type');
        $initiatives->taxonomy('post_tag');

//        $initiatives->filters(['year', 'post_tag']);

    }
}