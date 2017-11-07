<?php

namespace GivingTuesdayRo\GiveInitiatives\Taxonomies;

/**
 * Class AbstractTaxonomy
 * @package GivingTuesdayRo\GiveInitiatives\Taxonomies
 */
abstract class AbstractTaxonomy
{
    public function register()
    {
        $this->defineTaxonomy();
    }

    abstract protected function defineTaxonomy();
}
