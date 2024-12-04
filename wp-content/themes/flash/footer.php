<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flash
 */

?>

<style>
	/* CSS for toggling content */
	@media (max-width: 600px) {
		.footer-content {
			display: none;
		}

		.footer-content.active {
			display: block;
		}

		.footer-box h2 {
			display: flex;
			justify-content: space-between;
			align-items: center;
			cursor: pointer;
			background-color: #1FBBC6;
			color: white;
			padding: 10px;
			border-radius: 5px;
		}

		.footer-box h2:after {
			content: '+';
			font-size: 1.2em;
		}

		.footer-box h2.active:after {
			content: '-';
		}
	}

	.full-row {
		background-color: #1FBBC6;
	}

	.inner-footer {
		max-width: 1220px;
		width: 100%;
		display: flex;
		margin: 0 auto;
		justify-content: space-between;
	}

	.inner-footer a {
		color: #fff;
	}

	.footer-box-1 {
		width: 35%;
	}

	.footer-box-1 p {
		color: #fff;
	}

	.footer-box-2 {
		width: 20%;
	}

	.footer-box-3 {
		width: 20%;
	}

	.footer-box-4 {
		width: 20%;
	}

	.footer-box h2 {
		font-size: 16px;
		color: #fff;
		margin: 0;
		margin-top: 15px;
		margin-bottom: 15px;
	}

	.footer-box-2 ul li {
		list-style: none;
	}

	.footer-box-4 .footer-content {
		display: grid;
		grid-template-columns: 1fr 1fr;
	}

	.footer-box-4 .footer-content a {
		margin-bottom: 15px;
	}

	.full-footer-bottom {
		background: #169499;
		padding: 10px 0;
	}

	.inner-footer-bottom-container {
		max-width: 1220px;
		width: 100%;
		margin: auto;
		box-sizing: border-box;
		justify-content: space-between;
		color: #fff;
	}

	.left-footer-bottom {
		width: 40%;
		text-align: left;
		display: inline-block;
		color: rgb(255, 255, 255);
	}

	.mid-footer-bottom {
		display: inline-block;
		text-align: center;
		width: 19%;
	}

	.right-footer-bottom {
		display: inline-block;
		width: 40%;
		text-align: right;
	}

	.inner-footer-bottom-container a {
		color: #fff !important;
	}

	@media only screen and (max-width: 768px) {
		.inner-footer {
			flex-wrap: wrap;
		}

		.inner-footer a {
			color: #fff;
		}

		.footer-box-1,
		.footer-box-2,
		.footer-box-3,
		.footer-box-4 {
			width: 50%;
		}

		.footer-box h2 {
			font-size: 16px;
			color: #fff;
			margin: 0;
			margin-top: 15px;
			margin-bottom: 15px;
		}

		.footer-box-2 ul li {
			list-style: none;
		}

		.footer-box-4 .footer-content {
			display: grid;
			grid-template-columns: 1fr 1fr;
		}

		.footer-box-4 .footer-content a {
			margin-bottom: 15px;
		}

		.inner-footer-bottom-container {
			flex-direction: column;
			text-align: center;
		}

		.inner-footer-bottom-container img {
			height: auto;
			max-width: 100%;
			vertical-align: middle;
		}

		.footer-bottom {
			width: 100%;
			text-align: center;
		}
	}

	@media (max-width: 600px) {
		.inner-footer {
			flex-wrap: wrap;
		}

		.inner-footer a {
			color: #fff;
		}

		.footer-box-1,
		.footer-box-2,
		.footer-box-3,
		.footer-box-4 {
			width: 100%;
		}

		.footer-box h2 {
			font-size: 16px;
			color: #fff;
			margin: 0;
			margin-top: 15px;
			margin-bottom: 15px;
		}

		.footer-box-2 ul li {
			list-style: none;
		}

		.footer-box-4 .footer-content {
			display: grid;
			grid-template-columns: 1fr 1fr;
		}

		.footer-box-4 .footer-content a {
			margin-bottom: 15px;
		}

		.inner-footer-bottom-container {
			flex-direction: column;
			text-align: center;
		}

		.inner-footer-bottom-container img {
			height: auto;
			max-width: 100%;
			vertical-align: middle;
		}

		.footer-bottom {
			width: 100%;
			text-align: center;
		}
	}

	#scroll-up {
		display: none;
		z-index: 299;
		position: fixed;
		font-size: 20px;
		line-height: 36px;
		text-align: center;
		color: #FFF;
		top: auto;
		left: auto;
		right: 30px;
		bottom: 30px;
		cursor: pointer;
		border-radius: 2px;
		background-color: #ff551f;
		-webkit-transform: translateZ(0);
		-ms-transform: translateZ(0);
		-o-transform: translateZ(0);
		transform: translateZ(0);
		opacity: 0.8;
	}
</style>
</div><!-- .tg-container -->
</div><!-- #content -->

<?php
/**
 * flash_after_main hook
 */
do_action('flash_after_main'); ?>

<?php
/**
 * flash_before_footer hook
 */
do_action('flash_before_footer'); ?>
<footer class="full-row full-footer">
	<div class="inner-footer inner-container">
		<div class="footer-box footer-box-1">
			<h2>CÔNG TY TNHH ĐẦU TƯ TM & XNK NAM HẢI</h2>
			<div class="footer-content">
				<p>
					<i class="fa-solid fa-house"></i>
					Địa chỉ: Số nhà 1037 Đường Giải Phóng, Phường Thịnh Liệt, Quận Hoàng Mai, TP. Hà Nội
				</p>
				<p>
					<i class="fa-solid fa-phone"></i>
					Tel: 0977.260.612
				</p>
				<p>
					<i class="fa-solid fa-envelope"></i>
					Email: Sales@namhaiinox.com.vn
				</p>
				<p>
					<i class="fa-solid fa-globe"></i>
					Website: www.bulongnamhai.com
				</p>
			</div>
		</div>
		<div class="footer-box footer-box-2">
			<h2>CHÍNH SÁCH BÁN HÀNG</h2>
			<div class="footer-content">
				<ul id="footer-menu" class="menu">
					<li id="menu-item-181" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-181">
						<a href="#">Chính sách thanh toán</a>
					</li>
					<li id="menu-item-182" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-182">
						<a href="#">Chính sách vận chuyển</a>
					</li>
					<li id="menu-item-183" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-183">
						<a href="#">Chính sách bảo hành</a>
					</li>
					<li id="menu-item-184" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-184">
						<a href="#">Chính sách đối/ trả và hoàn tiền</a>
					</li>
					<li id="menu-item-185" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-181">
						<a href="#">Chính sách bảo mật thông tin</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="footer-box footer-box-3">
			<h2>BẢN ĐỒ</h2>
			<div class="footer-content">
				<iframe srckw="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0561850082076!2d105.7829330149188!3d21.030437785997403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454ac865806f3%3A0xe622b11fb8df6b87!2sC%C3%B4ng+ty+TNHH+KEYSKY!5e0!3m2!1svi!2s!4v1558230378876!5m2!1svi!2s" width="100%" frameborder="0" style="border:0" allowfullscreen="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0561850082076!2d105.7829330149188!3d21.030437785997403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454ac865806f3%3A0xe622b11fb8df6b87!2sC%C3%B4ng+ty+TNHH+KEYSKY!5e0!3m2!1svi!2s!4v1558230378876!5m2!1svi!2s"></iframe>
			</div>
		</div>
		<div class="footer-box footer-box-4">
			<h2>KẾT NỐI VỚI CHÚNG TÔI</h2>
			<div class="footer-content">
				<a href="#">
					<i class="fa-brands fa-facebook-f"></i>
					Facebook
				</a>
				<a href="#">
					<i class="fa-brands fa-youtube"></i>
					Youtube
				</a>
				<a href="#">
					<i class="fa-brands fa-twitter"></i>
					Twitter
				</a>
				<a href="#">
					<i class="fa-brands fa-instagram"></i>
					Instagram
				</a>
			</div>
			<a class="link_bct" href="#">
				<img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/dathongbao.png" alt="">
			</a>
		</div>
	</div>
</footer>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var footerTitles = document.querySelectorAll('.footer-box h2');

		footerTitles.forEach(function(title) {
			title.addEventListener('click', function() {
				this.classList.toggle('active');
				this.nextElementSibling.classList.toggle('active');
			});
		});
	});
</script>

<div class="full-footer-bottom">
	<div class="inner-footer-bottom-container">
		<div class="footer-bottom left-footer-bottom">
			Copyright 2019 © Bulông Nam Hải
		</div>
		<div class="footer-bottom mid-footer-bottom">
			<a href="">
				<img loading="lazy" class="dmca" src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/themes/keyweb/css/images/dmca.png" title="dmca" alt="dmca">
			</a>
		</div>
		<div class="footer-bottom right-footer-bottom">
			<a class="design-by" href="https://keyweb.vn/">Thiết kế website bởi Keyweb.vn</a>
		</div>

	</div>
</div>

<?php
/**
 * flash_after_footer hook
 */
do_action('flash_after_footer'); ?>

<?php if (get_theme_mod('flash_disable_back_to_top', '') != 1) : ?>
	<a href="#" id="scroll-up"><i class="fa fa-chevron-up"></i></a>
<?php endif; ?>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var scrollUp = document.getElementById("scroll-up");

		scrollUp.addEventListener("click", function(event) {
			event.preventDefault();
			window.scrollTo({
				top: 0,
				behavior: "smooth"
			});
		});
	});
</script>


</div><!-- #page -->

<?php
/**
 * flash_after hook
 */
do_action('flash_after'); ?>

<?php wp_footer(); ?>

</body>

</html>