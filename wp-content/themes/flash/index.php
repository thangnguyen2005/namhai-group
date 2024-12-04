<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flash
 */

get_header(); ?>

<?php
/**
 * flash_before_body_content hook
 */
do_action('flash_before_body_content'); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		if (have_posts()) :

			if (is_home() && !is_front_page()) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

		<?php
			endif;

			/* Start the Loop */
			while (have_posts()) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_format());

			endwhile;

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
/**
 * flash_after_body_content hook
 */
do_action('flash_after_body_content'); ?>

<?php
get_sidebar();
get_sidebar('left');
get_footer();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while (have_posts()) : the_post();

			get_template_part('template-parts/content', 'page');

			/**
			 * flash_before_comment_template hook
			 */
			do_action('flash_before_comment_template');

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;

			/**
			 * flash_after_comment_template hook
			 */
			do_action('flash_after_comment_template');

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->
<div class="sidebar-content" style="width: 20%;">
        <div class="block-sidebar">
            <div class="heading_box">Danh mục sản phẩm</div>
            <div class="block-content">
                <?php
                // Mảng danh sách các danh mục cha
                $parent_categories = array('bu lông', 'ốc vít', 'sản phẩm khác');
                $uncategorized = null;

                foreach ($parent_categories as $parent_name) {
                    // Lấy thông tin của danh mục cha
                    $parent_category = get_term_by('name', $parent_name, 'product_cat');

                    if ($parent_category) {
                        if ($parent_category->slug == 'uncategorized') {
                            // Bỏ qua danh mục chưa phân loại
                            continue;
                        }

                        echo '<div class="parent-category">';
                        echo '<h2><a href="' . get_term_link($parent_category) . '">' . $parent_category->name . '</a></h2>';

                        // Truy vấn danh mục con của danh mục cha, bao gồm cả danh mục rỗng
                        $child_categories = get_terms(array(
                            'taxonomy' => 'product_cat',
                            'child_of' => $parent_category->term_id,
                            'hide_empty' => false, // Hiển thị cả danh mục rỗng
                        ));

                        // Hiển thị danh mục con tương ứng với danh mục cha
                        echo '<div class="child-categories">';
                        foreach ($child_categories as $child_category) {
                            echo '<div class="category-item">';
                            echo '<a href="' . get_term_link($child_category) . '">' . $child_category->name . '</a>';
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
        <!-- Danh mục tin tức -->
        <div class="block-sidebar">
            <div class="heading_box">Danh mục tin tức</div>
            <div class="block-content">
                <?php
                // Lấy tất cả các chuyên mục cha (chuyên mục có parent = 0)
                $parent_categories = get_categories(array(
                    'parent' => 0,
                    'hide_empty' => false, // Hiển thị cả các chuyên mục cha rỗng
                    'order' => 'DSC' // Sắp xếp theo thứ tự tăng dần
                ));

                foreach ($parent_categories as $parent_category) {
                    // Kiểm tra nếu là danh mục chưa phân loại thì bỏ qua
                    if ($parent_category->slug === 'uncategorized') {
                        continue;
                    }

                    echo '<div class="parent-category">';
                    echo '<h2><a href="' . get_category_link($parent_category->term_id) . '">' . $parent_category->name . '</a></h2>';

                    // Lấy tất cả các chuyên mục con của chuyên mục cha hiện tại
                    $child_categories = get_categories(array(
                        'child_of' => $parent_category->term_id,
                        'hide_empty' => false // Hiển thị cả các chuyên mục con rỗng
                    ));

                    // Hiển thị các chuyên mục con tương ứng với chuyên mục cha
                    echo '<div class="child-categories">';
                    foreach ($child_categories as $child_category) {
                        echo '<div class="category-item">';
                        echo '<a href="' . get_category_link($child_category->term_id) . '">' . $child_category->name . '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

