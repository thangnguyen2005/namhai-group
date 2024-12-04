<?php get_header() ?>

<div class="thanh-toan">
    <?php echo do_shortcode('[woocommerce_checkout]')?>
</div>

<?php get_footer() ?>

<style>
    .thanh-toan {
        margin-top: 130px;
    }
</style>