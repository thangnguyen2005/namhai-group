<button id="toggle-sidebar-two" class="toggle-button"><i class="fa-solid fa-bars"></i></button>

<!-- Sidebar two -->
<div id="sidebar-two" class="sidebar-content">
	<!-- Sản phẩm vừa xem -->
	<div class="block-sidebar">
		<div class="heading_box">Sản phẩm vừa xem</div>
		<div class="block-content">
			<!-- Add content here -->
		</div>
	</div>
	<!-- Giỏ hàng -->
	<div class="block-sidebar">
		<div class="heading_box">Giỏ hàng</div>
		<div class="block-content">
			<!-- Add content here -->
		</div>
	</div>
	<!-- Từ khóa sản phẩm -->
	<div class="block-sidebar latest-posts">
		<div class="heading_box">Từ khóa sản phẩm</div>
		<div class="block-content">
			<p><i class="fa fa-tag"></i> bulong</p>
			<p><i class="fa fa-tag"></i> Bulong nở</p>
			<p><i class="fa fa-tag"></i> Inox</p>
			<p><i class="fa fa-tag"></i> tắc kê</p>
		</div>
	</div>
	<!-- Ảnh -->
	<div class="block-sidebar-img">
		<div>
			<a href="#"><img src="http://theme256v5.demov6.keyweb.vn/userdata/6961/wp-content/uploads/2019/12/cong-ty-nam-hai.jpg" alt=""></a>
		</div>
	</div>
</div>
<style>
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