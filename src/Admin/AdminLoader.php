<?php

namespace GivingTuesdayRo\GiveInitiatives\Admin;

use GivingTuesdayRo\GiveInitiatives\Structure\Metaboxes;

/**
 * Class AdminLoader
 * @package GivingTuesdayRo\GiveInitiatives\Admin
 */
class AdminLoader
{
    public function run()
    {
        (new Metaboxes())->register();
    }
}