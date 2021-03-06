<?php get_header(); ?>

    <header class="blog_header">
        <img class="blog_header_logo" src="<?= get_template_directory_uri(); ?>/img/blog-logo.png" alt="Jonathan Walker Designing Intelligently">
    </header>

	<main>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
            <div class="blog_featured-img">
                <?php if ( has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
            </div>
			<!-- /post thumbnail -->

			<!-- post title -->
			<h1>
				<?php the_title(); ?>
			</h1>
			<!-- /post title -->

			<!-- ul.blog_post-meta -->
            <ul class="blog_post-meta">
			<li class="date">
				<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
					<?php the_date(); ?>
				</time>
			</li>
			<li class="author"><?php _e( 'Written by', 'html5blank' ); ?> <?php the_author(); ?></li>
			<li class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></li>
            </ul>
			<!-- /ul.blog_post-meta -->

			<?php the_content(); // Dynamic Content ?>

            <footer class="blog_footer">
                <p class="blog_tags"><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
                </p>
    			<p class="blog_categories"><?php _e( 'Categories: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>
    			<p class="blog_author"><?php _e( 'Written by ', 'html5blank' ); the_author(); ?></p>
            </footer>


		</article>
		<!-- /article -->
        <!-- .blog_comments -->
        <section class="blog_comments">
            <!-- h2 is included within the comments template -->
            <?php comments_template(); ?>
        </section>
        <!-- /.blog_comments -->
	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</main>

    <aside class="blog_widgets-container">
        <?php dynamic_sidebar('blog-widgets'); ?>
    </aside>

<?php get_footer(); ?>
