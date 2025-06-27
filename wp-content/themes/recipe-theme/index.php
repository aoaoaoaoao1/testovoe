<?php get_header(); ?>
<main class="container mx-auto px-4 py-8">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class('mb-8'); ?>>
            <h2 class="text-2xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="prose"><?php the_excerpt(); ?></div>
        </article>
    <?php endwhile; else: ?>
        <p><?php esc_html_e('No posts found.', 'lovable-recipe-theme'); ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
