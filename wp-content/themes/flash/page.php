<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

<main id="main" class="content-wrap" role="main">
	<div class="banner-slider">
		<?php
		echo do_shortcode('[smartslider3 slider="2"]');
		?>
	</div>
	<h1 class="home_slogan">"Bulong Nam Hải – Cùng bạn phát triển!"</h1>
	<div class="home-box-category">
		<?php
		// Mảng danh sách các danh mục cha và các danh mục con tương ứng
		$categories_to_display = array(
			'bu lông' => array('bu lông cường độ cao', 'bu lông hóa chất', 'bu lông inox', 'bu lông neo móng'), // Danh sách danh mục con của 'bu lông'	
			'ốc vít' => array('vít bake', 'vít bắn gỗ', 'vít bắn tôn', 'vít inox'), // Danh sách danh mục con của 'ốc vít'
		);

		foreach ($categories_to_display as $parent_name => $child_names) {
			// Lấy thông tin của danh mục cha
			$parent_category = get_term_by('name', $parent_name, 'product_cat');

			if ($parent_category) {
				echo '<div class="parent-category">';
				echo '<h2>' . $parent_category->name . '</h2>';
				// Hiển thị danh mục con tương ứng với danh mục cha
				echo '<div class="child-categories">';
				foreach ($child_names as $child_name) {
					// Lấy thông tin của từng danh mục con
					$child_category = get_term_by('name', $child_name, 'product_cat');

					if ($child_category) {
						$thumbnail_id = get_term_meta($child_category->term_id, 'thumbnail_id', true);
						$image = wp_get_attachment_url($thumbnail_id);

						echo '<div class="category-item">';
						if ($image) {
							echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($child_category->name) . '">';
						}
						echo '<a href="' . get_term_link($child_category) . '">' . $child_category->name . '</a>';
						echo '<p>' . $child_category->count . ' Sản phẩm</p>';
						echo '</div>';
					}
				}
				echo '</div>';
				echo '</div>';
				echo '<p class="view-all">' . '<a href="' . get_term_link($parent_category) . '">>> Xem tất cả</a>' . '</p>';
			}
		}
		?>
	</div>
	<div class="home-box-du-an">
		<div class="home-box-du-an-left">
			<h4>
				CÁC DỰ ÁN ĐÃ GÓP MẶT
			</h4>
			<?php
			echo do_shortcode('[smartslider3 slider="3"]');
			?>
		</div>
		<div class="home-box-du-an-right">
			<h4>
				TẠI SAO BẠN NÊN CHỌN BULONG NAM HẢI?
			</h4>
			<h5>
				<span>1.</span> Chúng tôi luôn đặt tiêu chí phục vụ khách hàng lên hàng đầu
			</h5>
			<p>
				Toàn bộ đội ngũ nhân viên của chúng tôi thấu hiểu một điều rằng thành công của chúng tôi nằm trong những giá trị mà chúng tôi đem lại cho
				khách hàng. Chính vì lẽ đó, Bulong Nam Hải luôn cố gắng phát triển bền vững và không ngừng nâng cấp về chất lượng sản xuất.
			</p>
			<h5>
				<span>2.</span> Chúng tôi là lựa chọn của nhiều các doanh nghiệp lớn và nhỏ
			</h5>
			<p>
				Bulong Nam Hải giúp các doanh nghiệp lớn và nhỏ tiết kiệm thời gian và chi phí của mình bằng cách cung cấp đa dạng các chủng loại bu lông –
				ốc vít inox đặc thù yêu cầu chính xác theo bản vẽ phục vụ cho các ngành: Giao thông, viễn thông, điện lực, cơ khí, đóng tàu, kết cấu nhà thép,
				nhiệt điện, lọc hóa dầu, cấp thoát nước, cơ điện lạnh, xi măng…
			</p>
			<h5>
				<span>3.</span> Chúng tôi coi trọng mối quan hệ lâu dài
			</h5>
			<p>
				Hành trình phát triển của Công ty TNHH đầu tư thương mại và xuất nhập khẩu Nam Hải chúng tôi bắt đầu bằng việc khởi tạo các mối quan hệ hợp
				tác tin tưởng – và hoàn thành công việc bằng việc duy trì mối quan hệ dài lâu qua chính sách hỗ trợ, hậu mãi tạo dựng niềm tin cho khách hàng.
			</p>

		</div>
	</div>
	<div style="display: flex; margin-top: 30px">
		<div style="width: 50%;">
			<?php
			echo do_shortcode('[smartslider3 slider="4"]');
			?>
		</div>
		<div style="width: 50%;">
			<?php
			echo do_shortcode('[smartslider3 slider="5"]');
			?>
		</div>
	</div>
	<div>
		<h4 style="color: #018791; padding-top: 10px; text-align: center; margin: 15px 0px 15px 0px">
			KINH NGHIỆM HAY
		</h4>

		<div class="home-box-tin-tuc">
			<div class="home-box-tin-tuc-left">
				<?php echo do_shortcode('[smartslider3 slider="6"]'); ?>
			</div>
			<div class="home-box-tin-tuc-right">
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
						echo '<div class="tin-tuc-item">';
						echo '<a href="' . get_permalink() . '" class="post-link">';
						echo '<div class="tin-tuc-title">';
						echo '<h1 class="page-heading">' . get_the_title() . '</h1>';
						echo '<div class="tin-tuc-content">' . '<strong>' . get_the_date('d/m/Y') . '</strong>' . ': ' . wp_trim_words(get_the_content(), 25, '[...]') . '</div>';
						echo '</div>';
						echo '</a>';
						echo '</div>';
					}
					wp_reset_postdata();
				} else {
					echo '<p>Không tìm thấy bài viết.</p>';
				}
				?>
			</div>
		</div>
	</div>
	<div style="margin: 25px 0px 25px 0px">
		<?php
		echo do_shortcode('[smartslider3 slider="7"]');
		?>
	</div>
	<div class="home-box-kh-danhgia">
		<h3>KHÁCH HÀNG NÓI VỀ CHÚNG TÔI</h3>
		<div class="home-box-kh-danhgia-content">
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'order' => 'ASC',

			);
			$query = new WP_Query($args);
			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
					echo '<div class="home-inner-kh-danhgia">'; // Thêm div bao quanh từng đánh giá
					if (has_post_thumbnail()) {
						echo '<div class="kh-danhgia-img">' . get_the_post_thumbnail() . '</div>';
					}
					echo '<div class="kh-danhgia-content">' . get_the_content() . '</div>';
					echo '<div class="kh-danhgia-name">' . '<b>' . get_the_author() . '</b>' . ' / ' . get_the_excerpt() . '</div>';
					echo '</div>'; // Đóng div của từng đánh giá
				}
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<div class="home-box-kh-thanthiet">
		<h3>Khách hàng thân thiết</h3>
		<!-- Slider main container -->
		<div class="swiper-container">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">

				<!-- Slides -->
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/logo-lilama.jpg" alt="Image 1"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/logo-Hawee.jpg" alt="Image 2"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/logo-doi-tac-nam-hai.jpg" alt="Image 3"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/LOGO-HASKY.jpg" alt="Image 4"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/VINACONEX.jpg" alt="Image 5"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/LOGO-HOA-BINH.jpg" alt="Image 6"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/logo-lilama.jpg" alt="Image 1"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/logo-Hawee.jpg" alt="Image 2"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/logo-doi-tac-nam-hai.jpg" alt="Image 3"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/LOGO-HASKY.jpg" alt="Image 4"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/VINACONEX.jpg" alt="Image 5"></div>
				<div class="swiper-slide"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/LOGO-HOA-BINH.jpg" alt="Image 6"></div>
			</div>
			<!-- If we need pagination -->
			<div class="swiper-pagination"></div>

			<!-- If we need navigation buttons -->

		</div>
	</div>

	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper('.swiper-container', {
			slidesPerView: 6,
			spaceBetween: 10,
			loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
			breakpoints: {
				// when window width is <= 768px
				1023: {
					slidesPerView: 6,
					spaceBetween: 10
				},
				899: {
					slidesPerView: 5,
					spaceBetween: 10
				},
				767: {
					slidesPerView: 4,
					spaceBetween: 10
				},
				0: {
					slidesPerView: 3,
					spaceBetween: 10
				},

			}
		});
	</script>
</main>

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


<style>
	.home-box-kh-thanthiet h3 {
		float: left;
		text-align: center;
		width: 100%;
		border-top: 2px solid rgba(243, 112, 34, 0.5);
		color: #008080;
		padding-top: 25px;
		font-size: 21px;
		margin-top: 30px;
	}

	.swiper-wrapper {
		height: 120px;
	}

	.swiper-container {
		width: 100%;
		overflow: hidden;
	}


	.swiper-slide {
		float: left;
		overflow: hidden;
		width: 100%;
		border: 1px solid rgba(243, 112, 34, 0.5);
		height: 110px;
		padding: 10px;
		box-sizing: border-box;
	}

	.swiper-slide img {
		width: 100%;
		height: 100%;
	}

	.swiper-pagination {
		display: none;
	}

	.banner-slider {
		margin-top: 120px;
	}

	.home-box-category {
		text-align: center;
		margin-top: 20px;
	}

	.home-box-category p.view-all {
		text-align: right;
		padding-bottom: 5px;
		border-bottom: 2px solid rgba(243, 112, 34, 0.2);
		margin: 0;
		margin-bottom: 10px;
	}

	.home-box-category p.view-all a {
		color: #018791;
	}

	.home-box-du-an {
		display: flex;
	}

	.home-box-du-an-left {
		width: 40%;
		padding-right: 10px;
	}

	.home-box-du-an-left h4 {
		color: #018791;
		padding-bottom: 10px;
		text-align: center;
	}

	.home-box-du-an-right {
		width: 60%;
		padding-left: 10px;
	}

	.home-box-du-an-right h4 {
		color: #018791;
		padding-bottom: 10px;
		text-align: center;
	}

	.home-box-du-an-right h5 {
		font-style: italic;
		font-size: 20px
	}

	.home-box-du-an-right span {
		font-size: 30px;
		color: #018791;
	}

	.home-box-du-an-right p {
		margin-top: 10px;
		font-size: 14px;
	}

	.home-box-kh-danhgia {
		margin-top: 20px;
	}

	.home-box-kh-danhgia h3 {
		text-align: center;
		width: 100%;
		color: #008080;
		text-transform: uppercase;
		font-size: 21px;
	}

	.home-inner-kh-danhgia {
		float: left;
		width: 33.33%;
	}

	.kh-danhgia-img {
		width: 160px;
		border-radius: 99px;
		border: 1px solid #ccc;
		box-sizing: border-box;
		overflow: hidden;
		margin-right: 10px;
		height: 160px;
		float: left;
		margin-bottom: 10px;
	}

	.kh-danhgia-img img {
		width: 100%;
		border-radius: 133px;
		padding: 2%;
	}

	.kh-danhgia-content {
		font-style: italic;
		min-height: 160px;
		display: inline;
		font-size: 14px;
		color: #008080;
	}

	.kh-danhgia-name {
		float: left;
		width: 100%;
		text-align: right;
		margin-top: 15px;
		font-style: italic;
		font-size: 13px;
	}

	.parent-category {
		margin-bottom: 40px;
	}

	.parent-category h2 {
		margin-top: 20px;
		margin-bottom: 20px;
		width: 100%;
		color: #01959f;
		font-size: 21px;
		text-align: center;

	}

	.child-categories {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		gap: 15px;
	}

	.category-item {
		list-style: none;
		margin-bottom: 20px;
		text-align: center;
		border: 2px solid #ddd;
		padding: 1px;
		width: calc(25% - 20px);
	}

	.category-item:hover {
		cursor: pointer;
		background-color: #01959f;
		color: #ddd;
	}

	.category-item:hover a,
	.category-item:hover p {
		color: #ddd;
	}

	.category-item img {
		width: 100%;
		height: auto;
	}

	.category-item a {
		display: block;
		font-weight: bold;
		text-decoration: none;
		color: #01959f;
		/* Default text color (blue) */
		transition: background-color 0.3s, color 0.3s;
	}

	.category-item p {
		margin: 5px 0 0;
		color: #01959f;
		/* Default product count color (blue) */
		transition: background-color 0.3s, color 0.3s;
	}

	.slider {
		width: 100%;
		margin: auto;
		overflow: hidden;

	}

	.slide {
		display: inline-block;
		width: 16.66%;
		/* 100% / 6 slides */
		box-sizing: border-box;
		padding: 10px;
		border: 1px solid #ddd;
	}

	.slide img {
		width: 100%;
		height: auto;
	}

	.home-box-tin-tuc {
		display: flex;
		background-color: #ffffff;
		margin-bottom: 30px;
	}

	.home-box-tin-tuc h4 {
		color: #018791;
		padding-top: 10px;
		text-align: center;
		margin: 15px 0;
		font-size: 20px;
		/* Giảm kích thước font */
		font-weight: bold;
	}

	.home-box-tin-tuc-left {
		width: 50%;
		padding-right: 10px;
	}

	.home-box-tin-tuc-right {
		width: 50%;
		padding-left: 10px;
	}

	.tin-tuc-item:last-child {
		border-bottom: none;
	}

	.tin-tuc-title {
		margin-bottom: 5px;
	}

	.tin-tuc-title h1 {
		font-size: 13px;
		/* Giảm kích thước font */
		margin: 0;
		color: #018791;
		font-weight: bold;
		font-style: italic;

	}

	.tin-tuc-meta {
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-bottom: 5px;
	}

	.tin-tuc-date {
		font-size: 12px;
		/* Giảm kích thước font */
		color: #666666;
		width: 80px;
	}

	.tin-tuc-content {
		font-size: 12px;
		/* Tăng kích thước font */
		color: #333333;
		flex-grow: 1;
		font-style: italic;
		/* Chữ nghiêng */
	}

	.post-link {
		text-decoration: none;
		color: inherit;
	}

	.carousel {
		width: 80%;
		margin: 0 auto;
		overflow: hidden;
	}

	.carousel-inner {
		display: flex;
		transition: transform 0.5s ease;
	}

	.carousel-item {
		padding: 10px;
		flex: 0 0 calc(100% / 6);
	}

	.carousel-item img {
		border: 1px solid #f36f21;
		height: 100px;
	}

	@media only screen and (max-width: 768px) {

		.category-item {
			list-style: none;
			margin-bottom: 20px;
			text-align: center;
			border: 2px solid #ddd;
			padding: 1px;
			width: calc(50% - 20px);
		}

		.category-item:hover {
			cursor: pointer;
			background-color: #01959f;
			color: #ddd;
		}

		.category-item:hover a,
		.category-item:hover p {
			color: #ddd;
		}

		.category-item img {
			width: 100%;
			height: auto;
		}

		.category-item a {
			display: block;
			font-weight: bold;
			text-decoration: none;
			color: #01959f;
			/* Default text color (blue) */
			transition: background-color 0.3s, color 0.3s;
		}

		.category-item p {
			margin: 5px 0 0;
			color: #01959f;
			/* Default product count color (blue) */
			transition: background-color 0.3s, color 0.3s;
		}

		.home-box-du-an {
			display: unset;
		}

		.home-box-du-an-left {
			width: 100%;
			margin-bottom: 10px;
		}

		.home-box-du-an-left h4 {
			color: #018791;
			padding-bottom: 10px;
			text-align: center;
		}

		.home-box-du-an-right {
			width: 100%;
		}

		.home-box-du-an-right h4 {
			color: #018791;
			padding-bottom: 10px;
			text-align: center;
		}

		.home-box-du-an-right h5 {
			font-style: italic;
			font-size: 20px
		}

		.home-box-du-an-right span {
			font-size: 30px;
			color: #018791;
		}

		.home-box-du-an-right p {
			margin-top: 10px;
			font-size: 14px;
		}

		.home-box-tin-tuc {
			display: unset;
			background-color: #ffffff;
			margin-bottom: 30px;
		}

		.home-box-tin-tuc h4 {
			color: #018791;
			padding-top: 10px;
			text-align: center;
			margin: 15px 0;
			font-size: 20px;
			/* Giảm kích thước font */
			font-weight: bold;
		}

		.home-box-tin-tuc-left {
			display: none;
		}

		.home-box-tin-tuc-right {
			width: 100%;
			padding-left: 10px;
		}

		.home-box-kh-danhgia {
			margin-top: 20px;
		}

		.home-box-kh-danhgia h3 {
			font-size: 16px;
		}

		.home-inner-kh-danhgia {
			width: 100%;
			border-bottom: 1px solid #008080;
			margin-bottom: 10px;
			padding-bottom: 5px;
		}

		.kh-danhgia-img {
			width: 80px;
			height: 80px;
			margin-bottom: 0;
		}

		.kh-danhgia-img img {
			width: 100%;
			border-radius: 133px;
			padding: 2%;
		}

		.kh-danhgia-content {
			font-style: italic;
			min-height: 160px;
			display: inline;
			font-size: 14px;
			color: #008080;
		}

		.kh-danhgia-name {
			float: left;
			width: 100%;
			text-align: right;
			margin-top: 15px;
			font-style: italic;
			font-size: 13px;
		}

	}


	@media (max-width: 900px) {
		.carousel-item {
			flex: 0 0 calc(100% / 5);
		}
	}

	@media (max-width: 768px) {
		.carousel-item {
			flex: 0 0 calc(100% / 4);
		}
	}

	@media (max-width: 640px) {
		.carousel-item {
			flex: 0 0 calc(100% / 3);
		}
	}
</style>