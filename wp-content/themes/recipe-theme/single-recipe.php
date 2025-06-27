<?php get_header(); ?>
<div class="min-h-screen bg-gray-50">
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="mb-8">
      <h1 class="text-3xl md:text-4xl font-bold mb-4 font-playfair tracking-wide"><?php the_title(); ?></h1>
      <div class="flex flex-col gap-2 mb-4">
        <div class="flex items-center gap-2">
          <?php echo recipe_theme_svg_icon('tags', 'h-5 w-5 text-purple-600'); ?>
          <?php
          $meal_types = get_the_terms(get_the_ID(), 'meal_type');
          if ($meal_types && !is_wp_error($meal_types)) {
              foreach ($meal_types as $meal_type) {
                  echo '<div class="inline-flex items-center border transition-colors bg-purple-600 text-white px-3 py-0.5 text-sm font-medium rounded-full">' . esc_html($meal_type->name) . '</div>';
              }
          }
          ?>
        </div>
        <div class="flex items-center gap-2 ml-7">
          <div class="flex flex-wrap gap-2">
            <?php
            $tags = get_the_terms(get_the_ID(), 'recipe_tag');
            if ($tags && !is_wp_error($tags)) {
                foreach ($tags as $tag) {
                    echo '<div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold bg-gray-100 text-gray-800">#' . esc_html($tag->name) . '</div>';
                }
            }
            ?>
          </div>
        </div>
      </div>
      <div class="relative rounded-lg overflow-hidden h-[300px] md:h-[400px] mb-6">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
          <div class="flex items-center gap-2">
            <div class="flex items-center text-recipe-cream">
              <?php
                $rating = floatval(get_field('rating'));
                $reviews = intval(get_field('reviews'));
                $full_stars = floor($rating);
                $empty_stars = 5 - $full_stars;
                for ($i = 0; $i < $full_stars; $i++) {
                  echo recipe_theme_svg_icon('start-active', 'w-5 h-5 text-yellow-400');
                }
                for ($i = 0; $i < $empty_stars; $i++) {
                  echo recipe_theme_svg_icon('star-nonactive', 'w-5 h-5 text-gray-300');
                }
              ?>
              <span class="ml-2 font-medium text-recipe-cream"><?php echo esc_html($rating); ?></span>
              <span class="ml-1 text-sm text-recipe-cream">(<?php echo esc_html($reviews); ?> reviews)</span>
            </div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="flex flex-col items-center p-3 bg-recipe-beige rounded-lg">
          <?php echo recipe_theme_svg_icon('clock', 'h-6 w-6 text-recipe-red mb-1'); ?>
          <span class="text-sm text-gray-600">Prep Time</span>
          <span class="font-medium"><?php the_field('prep_time'); ?></span>
        </div>
        <div class="flex flex-col items-center p-3 bg-recipe-beige rounded-lg">
          <?php echo recipe_theme_svg_icon('utensils', 'h-6 w-6 text-recipe-red mb-1'); ?>
          <span class="text-sm text-gray-600">Cook Time</span>
          <span class="font-medium"><?php the_field('cook_time'); ?></span>
        </div>
        <div class="flex flex-col items-center p-3 bg-recipe-beige rounded-lg">
          <?php echo recipe_theme_svg_icon('chef-hat', 'h-6 w-6 text-recipe-red mb-1'); ?>
          <span class="text-sm text-gray-600">Difficulty</span>
          <span class="font-medium"><?php the_field('difficulty'); ?></span>
        </div>
        <div class="flex flex-col items-center p-3 bg-recipe-beige rounded-lg">
          <?php echo recipe_theme_svg_icon('user', 'h-6 w-6 text-recipe-red mb-1'); ?>
          <span class="text-sm text-gray-600">Servings</span>
          <span class="font-medium"><?php the_field('servings'); ?></span>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="md:col-span-1">
        <div class="rounded-lg border text-card-foreground p-5 bg-white shadow-md mb-8">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold m-0">Ingredients</h2>
          </div>
          <div class="flex items-center justify-between mb-4">
            <p class="text-sm text-gray-600 m-0 font-regular">For <?php the_field('servings'); ?> servings</p>
            <?php $calories = get_field('calories'); if ($calories): ?>
              <div class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 shadow-sm">
                <?php echo recipe_theme_svg_icon('badge', 'w-4 h-4 text-white mr-1'); ?>
                <span class="text-xs font-semibold text-white"><?php echo esc_html($calories); ?> cal</span>
              </div>
            <?php endif; ?>
          </div>
          <ul class="space-y-3 ingredient-text">
            <?php if (have_rows('ingredients')): while (have_rows('ingredients')): the_row(); ?>
              <li class="flex items-start gap-2 p-2 hover:bg-gray-50 rounded-md transition-colors">
                <?php echo recipe_theme_svg_icon('circle-check-big', 'w-5 h-5 text-recipe-green mt-0.5 flex-shrink-0'); ?>
                <span><?php the_sub_field('ingredient_name'); ?></span>
              </li>
            <?php endwhile; endif; ?>
          </ul>
        </div>
      </div>
      <div class="md:col-span-2">
        <div class="rounded-lg border text-card-foreground p-5 bg-white shadow-md mb-8">
          <h2 class="text-2xl font-bold m-0 mb-4">Instructions</h2>
          <ol class="space-y-6 ingredient-text">
            <?php if (have_rows('instructions')): $step = 1; while (have_rows('instructions')): the_row(); ?>
              <li class="flex items-center min-h-8 m-0">
                <div class="flex-shrink-0 mr-4">
                  <div class="flex items-center justify-center w-8 h-8 bg-recipe-red text-white rounded-full"><?php echo $step; ?></div>
                </div>
                <div class="pt-1">
                  <p class="text-gray-700 m-0"><?php the_sub_field('step'); ?></p>
                </div>
              </li>
            <?php $step++; endwhile; endif; ?>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>