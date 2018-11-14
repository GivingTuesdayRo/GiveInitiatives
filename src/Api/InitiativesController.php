<?php

namespace GivingTuesdayRo\GiveInitiatives\Api;

use GivingTuesdayRo\GiveInitiatives\Taxonomies\Initiatives;
use WP_Query;
use WP_REST_Request;

/**
 * Class InitiativesController
 * @package GivingTuesdayRo\GiveInitiatives\Api
 */
class InitiativesController {

	/**
	 * @param WP_REST_Request $request
	 */
	public function index( WP_REST_Request $request ) {
		$limit   = isset( $request['limit'] ) ? intval( $request['limit'] ) : - 1;
		$compact = isset( $request['compact'] ) ? intval( $request['compact'] ) : 0;

		$query = new WP_Query(
			[
				'post_type'      => Initiatives::TAXONOMY_TYPE,
				'posts_per_page' => $limit,
				'post_status'    => 'publish',
				'orderby'        => 'rand'
			]
		);

		$response = [];

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$ID = get_the_ID();

				if ( $compact ) {
					$response[] = [
						"name"        => get_the_title(),
						"description" => get_the_content(),
						"image"       => get_the_post_thumbnail_url( $ID, 'medium' ),
						"url"         => get_the_permalink(),
						"nation"      => 'RO'
					];
				} else {
					$response[] = [
						"id"        => $ID,
						"title"     => [
							"rendered" => get_the_title()
						],
						"content"   => [
							"rendered" => get_the_content()
						],
						"link"      => get_the_permalink(),
						"date"      => get_the_date(),
						"image_url" => [
							"thumbnail"   => get_the_post_thumbnail_url( $ID, 'thumbnail' ),
							"medium"      => get_the_post_thumbnail_url( $ID, 'medium' )
						]
					];
				}
			}
		}

		echo json_encode( $response );
		die();
	}
}
