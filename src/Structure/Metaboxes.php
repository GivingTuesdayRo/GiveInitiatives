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
            'context' => 'normal',
            'fields' => [
	            [
		            'name'  => 'initiative_name',
		            'label' => 'Denumire'
	            ],
	            [
		            'name'  => 'initiative_type',
		            'label' => 'Tip initiativa'
	            ],
	            [
		            'name'  => 'initiative_date',
		            'label' => 'Cand se intampla'
	            ],
	            [
		            'name'  => 'initiative_address',
		            'label' => 'Adresa'
	            ],
	            [
		            'name'  => 'initiative_city',
		            'label' => 'Unde'
	            ],
	            [
		            'name'  => 'initiative_county',
		            'label' => 'Unde'
	            ]
            ]
        ] );

	    MetaboxManager::instance()->newMetabox( [
		    'id'       => 'initiative_organization',
		    'title'    => 'Initiatives Organizer',
		    'postType' => 'initiative',
		    'context'  => 'normal',
		    'fields'   => [
			    [
				    'name'  => 'organization_name',
				    'label' => 'Nume organizatie'
			    ],
			    [
				    'name'  => 'contact_name',
				    'label' => 'Nume persoana de contact'
			    ],
			    [
				    'name'  => 'contact_email',
				    'label' => 'Email persoana de contact'
			    ],
		    ]
	    ] );
    }
}