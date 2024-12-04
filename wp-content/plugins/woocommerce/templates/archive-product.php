<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

// Thêm sidebar vào trang sản phẩm
get_template_part('sidebar', 'product');

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action('woocommerce_shop_loop_header');

// Lấy danh mục hiện tại
$current_category = get_queried_object();

// Kiểm tra xem danh mục hiện tại có phải là "bu lông" hoặc "ốc vít"
if ($current_category && $current_category->taxonomy === 'product_cat') {
    $parent_category_slug = $current_category->slug;

    // Lấy ID của danh mục cha
    $parent_category = get_term_by('slug', $parent_category_slug, 'product_cat');

    if ($parent_category) {
        // Lấy danh mục con của danh mục hiện tại
        $child_categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'child_of' => $parent_category->term_id,
            'hide_empty' => true, // Chỉ hiển thị danh mục con có sản phẩm
        ));

        if (!empty($child_categories)) {
            // Nếu có danh mục con, hiển thị chúng
            echo '<div class="all-categories">';
            echo '<div class="parent-category-sp">';
            echo '<div class="child-categories-sp">';

            foreach ($child_categories as $child_category) {
                $thumbnail_id = get_term_meta($child_category->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_url($thumbnail_id);

                echo '<div class="category-item-sp">';
                if ($image) {
                    echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($child_category->name) . '">';
                }
                echo '<a href="' . get_term_link($child_category) . '">' . $child_category->name . '</a>';
                echo '<p>' . $child_category->count . ' Sản phẩm</p>';
                echo '</div>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            // Nếu không có danh mục con, hiển thị sản phẩm của danh mục hiện tại
            if (woocommerce_product_loop()) {
                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action('woocommerce_before_shop_loop');

                woocommerce_product_loop_start();

                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }
                }

                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action('woocommerce_no_products_found');
            }
        }
    }
}


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
?>

<style>
    .all-products {
        width: 80%;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        /* Khoảng cách giữa các sản phẩm */
        list-style: none;
    }

    .all-products .product {
        background: #f9f9f9;
        /* Màu nền cho mỗi sản phẩm */
        padding: 10px;
        border: 1px solid #ddd;
        /* Đường viền cho mỗi sản phẩm */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Đổ bóng cho mỗi sản phẩm */
        transition: transform 0.2s;
        /* Hiệu ứng khi di chuột vào sản phẩm */
    }

    .all-products .product:hover {
        transform: translateY(-5px);
        /* Dịch chuyển sản phẩm lên khi di chuột vào */
    }
    .all-products li a h2 {
        font-size: 1em;
        font-weight: 700;
    }

    .woocommerce-result-count {
        display: none;
    }

    .woocommerce-ordering {
        display: none;
    }

    .all-categories {
        width: 80%;
    }

    .site-main {
        display: flex !important;
    }

    .parent-category-sp {
        margin-bottom: 40px;
    }

    .parent-category-sp h2 {
        margin-bottom: 20px;
    }

    .child-categories-sp {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .category-item-sp {
        list-style: none;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        padding: 2px;
        width: calc(25% - 20px);
        text-align: center;
    }

    .category-item-sp:hover {
        cursor: pointer;
        background-color: #01959f;
        color: #ddd;
    }

    .category-item-sp:hover a,
    .category-item-sp:hover p {
        color: #ddd;
    }

    .category-item-sp img {
        width: 100%;
        height: auto;
    }

    .category-item-sp a {
        display: block;
        font-weight: bold;
        text-decoration: none;
        color: #01959f;
        /* Default text color (blue) */
        transition: background-color 0.3s, color 0.3s;
    }

    .category-item-sp p {
        margin: 5px 0 0;
        color: #01959f;
        /* Default product count color (blue) */
        transition: background-color 0.3s, color 0.3s;
    }

    .woocommerce-products-header {
        clear: both;
    }

    @media (max-width: 768px) {
        .all-categories {
            width: 100%;
        }

        .category-item-sp {
            width: calc(50% - 20px);
        }

    }
</style>
