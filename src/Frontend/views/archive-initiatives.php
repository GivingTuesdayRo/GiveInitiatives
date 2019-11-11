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
                    <h1 class="">
                        Initiative
                    </h1>
                    <p class="lead">
                        Mai jos gasesti lista intiativelor propuse de alti oameni si grupuri de bine. Speram ca te vor
                        inspira!
                    </p>
                    <a href="https://givingtuesday.ro/initiative-adauga/" class="btn btn-danger btn-lg btn-initiative-add">
                        Înscrie inițiativa
                    </a>
                </header><!-- .page-header -->
            </div>

            <div class="container">
				<?php require 'initiatives/filters.php'; ?>
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

            <div class="container text-center mb-5">
                <a href="https://givingtuesday.ro/initiative-adauga/" class="btn btn-danger btn-lg center  btn-initiative-add">
                    Înscrie inițiativa
                </a>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();
