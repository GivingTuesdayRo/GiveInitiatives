<?php

namespace GivingTuesdayRo\GiveInitiatives\Taxonomies;

use PostTypes\PostType;

/**
 * Class Initiatives
 * @package GivingTuesdayRo\GiveInitiatives\Taxonomies
 */
class Initiatives extends AbstractTaxonomy {

	const TAXONOMY_TYPE = 'initiative';

	protected function defineTaxonomy() {
		$initiatives = new PostType(
			self::TAXONOMY_TYPE,
			[
				'supports'     => [ 'title', 'editor', 'thumbnail', 'tags', 'custom-fields' ],
				'show_in_rest' => true,
				'has_archive'  => true
			]
		);

		$initiatives->taxonomy( [
			'name'     => 'campaign-year',
			'slug'     => 'campaign-year',
			'singular' => 'Campaign Year',
			'plural'   => 'Campaign Years'
		] );

		$initiatives->taxonomy( [
			'name'     => 'initiative-type',
			'slug'     => 'initiative-type',
			'singular' => 'Initiative Type',
			'plural'   => 'Initiative Types'
		] );

		$initiatives->taxonomy( [
			'name'     => 'initiator-type',
			'slug'     => 'initiator-type',
			'singular' => 'Initiator Type',
			'plural'   => 'Initiator Types'
		] );

		$initiatives->taxonomy( [
			'name'     => 'beneficiary-type',
			'slug'     => 'beneficiary-type',
			'singular' => 'Beneficiary Type',
			'plural'   => 'Beneficiary Types'
		] );

		$initiatives->taxonomy( 'post_tag' );

//        $initiatives->filters(['year', 'post_tag']);
	}
}