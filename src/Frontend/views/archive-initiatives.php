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
						<?php echo __( 'Initiatives', GIVE_INITIATIVES_TEXT_DOMAIN ) ?>
                    </h1>
                    <p class="lead">
                        Mai jos găsești lista ințiativelor de GivingTuesday ale ONG-urilor, companiilor, instituțiilor
                        și oamenilor de bine.
                        Înscrie propria inițiativă sau alătură-te inițiativelor lor!
                    </p>
                    <a href="https://givingtuesday.ro/initiative-adauga/"
                       class="btn btn-danger btn-lg btn-initiative-add">
                        Înscrie inițiativa
                    </a>
                </header><!-- .page-header -->
            </div>

            <div class="container">
				<?php require 'initiatives/filters.php'; ?>
            </div>

            <div class="container">
				<?php
				if ( have_posts() ) : ?>
					<?php require 'initiatives/loop-initiatives.php'; ?>

					<?php
					// Previous/next page navigation.
					require 'pagination.php';
				//					the_posts_pagination( [
//						'prev_text'          => __( 'Previous page' ),
//						'next_text'          => __( 'Next page' ),
//						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page' ) . ' </span>',
//					] );
				else :
					require 'initiatives/not-found.php';
				endif; ?>
            </div>
            <div class="container text-center mb-5">
                <a href="https://givingtuesday.ro/initiative-adauga/"
                   class="btn btn-danger btn-lg center  btn-initiative-add">
                    Înscrie inițiativa
                </a>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();
