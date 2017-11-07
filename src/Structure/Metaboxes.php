<?php

namespace GivingTuesdayRo\GiveInitiatives\Structure;

use GiveInitiatives\Library\Metabox\MetaboxManager;

/**
 * Class Metaboxes
 * @package GivingTuesdayRo\GiveInitiatives\Structure
 */
class Metaboxes
{
    public function register()
    {
        MetaboxManager::instance()->newMetabox([
            'id' => 'initiative_options',
            'title' => 'Initiatives options',
            'postType' => 'initiative',
            'context' => 'side',
            'fields' => [
                [
                    'name' => 'organization_name',
                    'label' => 'Nume organizatie'
                ],
                [
                    'name' => 'initiative_date',
                    'label' => 'Cand se intampla'
                ],
                [
                    'name' => 'initiative_location',
                    'label' => 'Unde'
                ]
            ]
        ]);
    }
}