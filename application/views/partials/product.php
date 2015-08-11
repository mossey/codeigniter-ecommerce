<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <a href="<?php echo site_url(url_title($product->{'name_'.$language}).'-'.$product->id); ?>">
                    <img src="<?php echo site_url('img.php?src=uploads/'.$product->image.'&h=130'); ?>" alt="<?php echo $product->{'name_'.$language}; ?>" />
                </a>

                <?php if (!empty($product->special_price)) { ?>
                    <h2 style="font-weight: bold;color: #E34E31;font-size:32px">
                        <span style="display: inline-block;text-decoration: line-through;color: #6D6B67;font-size: 16px;margin-left: -30px;"><?php echo $product->price; ?></span>
                        <?php echo $product->special_price; ?>
                    </h2>
                <?php } else { ?>
                    <h2><?php echo $product->price; ?></h2>
                <?php } ?>

                <a href="<?php echo site_url(url_title($product->{'name_'.$language}).'-'.$product->id); ?>"><p><?php echo $product->{'name_'.$language}; ?></p></a>
                <a data-id="<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><?php echo lang('msg_add_to_cart'); ?></a>
            </div>
        </div>
    </div>
</div>