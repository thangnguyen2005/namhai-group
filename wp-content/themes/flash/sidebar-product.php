<button id="toggle-sidebar-one" class="toggle-button"><i class="fa-solid fa-bars"></i></button>
<!-- Sidebar one -->
<div id="sidebar-one" class="sidebar-content">
    <div class="block-sidebar">
        <div class="heading_box">LỌC TÌM SẢN PHẨM</div>

        <div class="filter-section firt">

            <h4>LỌC THEO GIÁ</h4>
            <?php
            the_widget('WC_Widget_Price_Filter', array());
            ?>
        </div>

        <div class="filter-section">
            <h4>THEO MÀU SẮC</h4>
            <?php
            the_widget('WC_Widget_Layered_Nav', array(
                'attribute'    => 'loc-theo-mau', // Thay 'pa_color' bằng slug của thuộc tính bạn muốn lọc
                'display_type' => 'list',     // Kiểu hiển thị: 'list' hoặc 'dropdown'
                'query_type'   => 'and'       // Kiểu truy vấn: 'and' hoặc 'or'
            ));
            ?>
        </div>
        <div class="filter-section">
            <h4>THEO CHẤT LIỆU</h4>
            <?php
            the_widget('WC_Widget_Layered_Nav', array(
                'attribute'    => 'loc-theo-chat-lieu', // Thay 'pa_color' bằng slug của thuộc tính bạn muốn lọc
                'display_type' => 'list',     // Kiểu hiển thị: 'list' hoặc 'dropdown'
                'query_type'   => 'and'       // Kiểu truy vấn: 'and' hoặc 'or'
            ));
            ?>
        </div>  

        <div class="filter-section">
            <h4>THEO HÃNG</h4>
            <?php
            the_widget('WC_Widget_Layered_Nav', array(
                'attribute'    => 'loc-theo-hang', // Thay 'pa_color' bằng slug của thuộc tính bạn muốn lọc
                'display_type' => 'list',     // Kiểu hiển thị: 'list' hoặc 'dropdown'
                'query_type'   => 'and'       // Kiểu truy vấn: 'and' hoặc 'or'
            ));
            ?>
        </div>
    </div>

    <!-- Danh mục sản phẩm -->
    <div class="block-sidebar">
        <div class="heading_box">Danh mục sản phẩm</div>
        <div class="block-content-text">
            <?php
            $parent_categories = array('bu lông', 'ốc vít', 'sản phẩm khác');
            $uncategorized = null;

            foreach ($parent_categories as $parent_name) {
                $parent_category = get_term_by('name', $parent_name, 'product_cat');

                if ($parent_category) {
                    if ($parent_category->slug == 'uncategorized') {
                        continue;
                    }

                    $child_categories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'child_of' => $parent_category->term_id,
                        'hide_empty' => false,
                    ));

                    echo '<div class="parent-category">';
                    echo '<a href="' . get_term_link($parent_category) . '">' . $parent_category->name . '</a>';
                    echo '</div>';

                    echo '<div class="child-categories">';
                    foreach ($child_categories as $child_category) {
                        echo '<div class="category-item">';
                        echo '<a href="' . get_term_link($child_category) . '">' . $child_category->name . '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <!-- Danh mục tin tức -->
    <div class="block-sidebar">
        <div class="heading_box">Danh mục tin tức</div>
        <div class="block-content-text">
            <?php
            $pages = array(
                'Góc Chia Sẻ' => 905,
                'Kiến Thức' => 911,
                'Tin Tức' => 914
            );

            echo '<div class="page-links">';
            foreach ($pages as $page_title => $page_id) {
                echo '<div class="page-item">';
                echo '<a href="' . get_page_link($page_id) . '">' . $page_title . '</a>';
                echo '</div>';
            }
            echo '</div>';
            ?>
        </div>
    </div>
    <!-- Bài viết mới nhất -->
    <div class="block-sidebar latest-posts">
        <div class="heading_box">Bài viết mới nhất</div>
        <div class="block-content">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'order' => 'DESC',
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="post-item">';

                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail">' . get_the_post_thumbnail() . '</div>';
                    } else {
                        echo '<div class="post-thumbnail"><img src="URL_TO_DEFAULT_IMAGE" alt="Ảnh mẫu"></div>';
                    }

                    echo '<div class="post-details">';
                    echo '<div class="post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
                    echo '<div class="post-date">' . get_the_date('d/m/Y') . '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                wp_reset_postdata();
            } else {
                echo '<p>Không có bài viết nào.</p>';
            }
            ?>
        </div>
    </div>
    <!-- Ảnh -->
    <div class="block-sidebar-img">
        <div>
            <a href=""><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/qc-left-1.jpg" alt=""></a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('toggle-sidebar-one').addEventListener('click', function() {
            document.getElementById('sidebar-one').classList.toggle('active');
        });

        const priceRange = document.getElementById('priceRange');
        const priceValue = document.getElementById('priceValue');

        priceRange.addEventListener('input', function() {
            priceValue.textContent = `Giá ₫0 — ₫${parseInt(priceRange.value).toLocaleString()}`;
        });

        document.querySelector('.filter-button').addEventListener('click', function() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    const data = JSON.parse(xhr.responseText);
                    let productsHtml = '';
                    data.forEach(function(product) {
                        productsHtml += `<div class="product">
                                            <h2>${product.name}</h2>
                                            <p>${product.price}</p>
                                            <a href="${product.permalink}">Xem sản phẩm</a>
                                         </div>`;
                    });
                    document.querySelector('.product-list').innerHTML = productsHtml;
                } else {
                    console.error('Error fetching products');
                }
            };

            xhr.send('action=custom_filter_products');
        });
    });
</script>


<style>
    .filter-container {
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .filter-header {
        background-color: #00a8a8;
        color: white;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
    }

    .filter-section {
        padding: 15px 0 5px 0;
        border-bottom: 2px solid #018791;
        box-sizing: border-box;
        margin-left: 10px;
        margin-right: 5px;
        box-sizing: border-box;
    }

    .filter-section h3 {
        margin: 0;
        font-size: 16px;
        color: #00a8a8;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .filter-section .filter-content {
        margin-top: 10px;
    }

    .filter-section .filter-content label {
        display: block;
        margin-bottom: 5px;
    }

    .filter-section .filter-content input[type="checkbox"] {
        margin-right: 5px;
    }

    .filter-button {
        font-size: 12px;
        background: #018791;
        color: #fff;
        padding: 5px 8px;
        font-weight: 400;
    }

    .filter-span {
        margin-left: 35px;
    }

    .filter-price {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .filter-price input[type="range"] {
        width: 100%;
    }

    .filter-price span {
        font-size: 14px;
    }

    .toggle-button {
        position: fixed;
        top: 100px;
        z-index: 1000;
        background: #fff;
        color: black;
        border: none;
        padding: 10px;
        cursor: pointer;
        margin: 5px;
        display: none;
        width: 40px;
        height: 40px;
    }

    #toggle-sidebar-one {
        left: 10px;
    }

    #toggle-sidebar-two {
        right: 10px;
    }

    .sidebar-content {
        width: 20%;
        display: block;
    }

    #sidebar-one {
        padding-right: 10px;
    }

    #sidebar-two {
        right: 0;
    }

    .sidebar-content.active {
        display: block;
    }

    .main-content-page {
        padding: 20px;
        transition: margin-left 0.3s;
        width: 60%;
    }


    .page-links,
    .page-item,
    .sidebar-product,
    .content-wrap,
    .post-thumbnail,
    .page-heading,
    .post-date,
    .post-content,
    .block-sidebar,
    .heading_box,
    .block-content,
    .parent-category,
    .category-item,
    .latest-posts .block-content,
    .latest-posts .post-item,
    .latest-posts .post-thumbnail,
    .latest-posts .post-thumbnail img,
    .latest-posts .post-details,
    .latest-posts .post-title,
    .latest-posts .post-date,
    .block-sidebar-img,
    .block-sidebar-img img,
    .content-wrap.two-sidebar,
    .post-info,
    .block-sidebar-img a img {
        margin: 0;
        padding: 0;
    }

    .page-item {
        border-bottom: 1px solid #009688;
        padding: 10px;
        cursor: pointer;
    }

    .page-item a {
        text-decoration: none;
        color: #009688;
        display: block;
        /* Ensure link occupies the full width of the parent element */
    }

    .page-item:hover {
        background-color: #018791;
    }

    .page-item:hover a {
        color: #fff;
    }

    .sidebar-product {
        display: flex !important;
    }

    .content-wrap {
        margin-bottom: 20px;
        padding: 10px;
    }

    .post-thumbnail {
        margin-bottom: 10px;
    }

    .post-thumbnail img {
        max-width: 100%;
        height: auto;
        display: block;
        border-radius: 4px;
    }

    .page-heading {
        font-size: 18px;
        color: #018791;
        margin-top: 10px;
        font-weight: bold;
    }

    .post-date {
        font-size: 13px;
        color: black
    }

    .post-content {
        font-size: 13px;
        line-height: 1.6;
        color: #555;
    }

    .block-sidebar {
        border: 1px solid #00796b;
    }

    .heading_box {
        width: 100%;
        color: #fff;
        background: #018791;
        line-height: 38px;
        border-bottom: 2px solid #f37022;
        padding-left: 10px;
        font-size: 15px;
        text-transform: uppercase;
        box-sizing: border-box;
        font-weight: bold;
    }

    .block-content {
        background-color: #f8f8f8;
        padding: 10px;
    }

    .parent-category a,
    .category-item a {
        color: #00796b;
        text-decoration: none;
        display: block;
        padding: 10px;
        font-size: 14px;
        text-align: left;
    }

    .parent-category,
    .category-item {
        border-bottom: 1px solid #009688;
    }

    .parent-category a:hover,
    .category-item a:hover {
        background-color: #018791;
        color: #fff;
    }

    .latest-posts .block-content {
        display: flex;
        flex-direction: column;
        gap: 10px;
        /* Add space between each post */
    }

    .latest-posts .post-item {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .latest-posts .post-thumbnail {
        flex-shrink: 0;
        margin-right: 10px;
    }

    .latest-posts .post-thumbnail img {
        width: 50px;
        /* Reduced size */
        height: 50px;
        /* Reduced size */
        object-fit: cover;
        border: 1px solid #00796b;
    }

    .latest-posts .post-details {
        flex-grow: 1;
    }

    .latest-posts .post-title a {
        font-size: 11px;
        color: #018791;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* Number of lines to show */
        -webkit-box-orient: vertical;
    }

    .latest-posts .post-title a:hover {
        text-decoration: underline;
    }

    .latest-posts .post-date {
        font-size: 12px;
        color: #018791;
    }

    .block-sidebar-img {
        width: 100%;
    }

    .block-sidebar-img img {
        width: 100%;
        height: auto;
        display: block;
        /* Ensure correct block display format */
    }

    .content-wrap.two-sidebar {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 2px solid #018791;
        padding-bottom: 10px;
    }

    .post-thumbnail {
        width: 20%;
        margin-right: 20px;
    }

    .post-thumbnail img {
        width: 100%;
        height: auto;
    }

    .post-info {
        width: 75%;
    }

    .block-sidebar-img a img {
        padding: 0 !important;
    }

    @media only screen and (min-width: 769px) and (max-width: 900px) {
        .main-content-page {
            width: 100%;
        }

        .toggle-button {
            display: block;
        }

        .sidebar-content {
            display: none;
            width: 250px;
            position: fixed;
            top: 0;
            bottom: 0;
            width: 250px;
            overflow-y: auto;
            background: #f8f8f8;
            padding: 10px;
            z-index: 999;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            margin-bottom: 10px;
        }

        .main-content-page {
            margin-left: 0;
        }

        .toggle-button {
            display: block;
        }

        .sidebar-content.active {
            display: block;
        }

        #sidebar-one.active {
            left: 0;
        }

        #sidebar-two.active {
            right: 0;
        }
    }

    @media only screen and (min-width: 501px) and (max-width: 768px) {
        .main-content-page {
            width: 100%;
        }

        .toggle-button {
            display: block;
        }

        .sidebar-content {
            display: none;
            width: 250px;
            position: fixed;
            top: 0;
            bottom: 0;
            width: 250px;
            overflow-y: auto;
            background: #f8f8f8;
            padding: 10px;
            z-index: 999;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            margin-bottom: 10px;
        }

        .main-content-page {
            margin-left: 0;
        }

        .toggle-button {
            display: block;
        }

        .sidebar-content.active {
            display: block;
        }

        #sidebar-one.active {
            left: 0;
        }

        #sidebar-two.active {
            right: 0;
        }

        .page-heading {
            font-size: 13px;
        }

        .post-date {
            font-size: 10px;
            margin-top: 0px;
        }

        .post-content {
            font-size: 11px;
        }

        .post-content p {
            margin: 0;
        }
    }

    @media only screen and (max-width: 500px) {
        .main-content-page {
            width: 100%;
        }

        .toggle-button {
            display: block;
        }

        .sidebar-content {
            display: none;
            width: 250px;
            position: fixed;
            top: 0;
            bottom: 0;
            width: 250px;
            overflow-y: auto;
            background: #f8f8f8;
            padding: 10px;
            z-index: 999;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            margin-bottom: 10px;
        }

        .main-content-page {
            margin-left: 0;
        }

        .toggle-button {
            display: block;
        }

        .sidebar-content.active {
            display: block;
        }

        #sidebar-one.active {
            left: 0;
        }

        #sidebar-two.active {
            right: 0;
        }

        .page-heading {
            font-size: 13px;
        }

        .post-date {
            font-size: 10px;
            margin-top: 0px;
        }

        .post-content {
            display: none;
        }

    }
</style>