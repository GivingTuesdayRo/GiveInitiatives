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
        $initiatives = new PostType('initiative');

//        // Add the genre taxonomy to the book post type
//        $initiatives->taxonomy('tags');

        // Add the genre taxonomy to the book post type
        $initiatives->taxonomy('year');

        $initiatives->filters(['tags', 'category']);



    }
}