<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GivingTuesday
 */
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <header class="entry-header">
                    <h1 class="entry-title">
                        Initiative
                    </h1>
			        <?php
			        //						the_archive_title( '<h1 class="page-title">', '</h1>' );
			        the_archive_description( '<div class="archive-description">', '</div>' );
			        ?>
                </header><!-- .page-header -->
            </div>

            <div class="container">
		        <?php require 'initiatives-filter.php'; ?>
            </div>

			<?php
			if ( have_posts() ) : ?>
                <div class="container">
					<?php require 'loop-initiatives.php'; ?>
                </div>

				<?php
				// Previous/next page navigation.
				the_posts_pagination( [
					'prev_text'          => __( 'Previous page' ),
					'next_text'          => __( 'Next page' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page' ) . ' </span>',
				] );
			else :
				get_template_part( 'resources/templates/posts/content/content', 'none' );
			endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();
