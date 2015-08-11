<footer id="footer">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2><?php echo lang('msg_popular_categories'); ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?php if (!empty($footer_pages['popular_categories'])) { ?>
                                <?php foreach ($footer_pages['popular_categories'] as $popular_category) { ?>
                                    <li><a href="<?php echo site_url('categorie/' . url_title($popular_category->{'name_'.$language}) . '-' . $popular_category->id); ?>"><?php echo $popular_category->{'name_'.$language}; ?> (<?php echo $popular_category->products; ?>)</a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2><?php echo lang('msg_popular_products'); ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?php if (!empty($footer_pages['popular_products'])) { ?>
                                <?php foreach ($footer_pages['popular_products'] as $popular_product) { ?>
                                    <li><a href="<?php echo site_url(url_title($popular_product->{'name_'.$language}).'-'.$popular_product->id); ?>"><?php echo $popular_product->{'name_'.$language}; ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2><?php echo lang('msg_newest_products'); ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?php if (!empty($footer_pages['newest_products'])) { ?>
                                <?php foreach ($footer_pages['newest_products'] as $new_product) { ?>
                                    <li><a href="<?php echo site_url(url_title($new_product->{'name_'.$language}).'-'.$new_product->id); ?>"><?php echo $new_product->{'name_'.$language}; ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php if (!empty($general->about)) { ?>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2><?php echo lang('msg_about'); ?></h2>

                            <p><?php echo $general->about; ?></p>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">
                    © <?php echo date('Y', time()); ?> <?php echo !empty($general->logo_text) ? $general->logo_text : ''; ?>
                    .</p>
            </div>
        </div>
    </div>
</footer>


<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.cookie.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="/assets/js/gmaps.js"></script>
<script src="/assets/js/contact.js"></script>
<script src="/assets/js/jquery.scrollUp.min.js"></script>
<script src="/assets/js/price-range.js"></script>
<script src="/assets/js/jquery.prettyPhoto.js"></script>
<script src="/assets/js/main.js"></script>

<?php if (!empty($general) && !empty($general->analytics)) { ?>
    <?php echo $general->analytics; ?>
<?php } ?>

</body>
</html>