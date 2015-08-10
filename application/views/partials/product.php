<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <a href="<?php echo site_url(url_title($product->name).'-'.$product->id); ?>">
                    <img src="<?php echo site_url('img.php?src=uploads/'.$product->image.'&h=130'); ?>" alt="<?php echo $product->name; ?>" />
                </a>
                <h2><?php echo $product->price; ?></h2>
                <a href="<?php echo site_url(url_title($product->name).'-'.$product->id); ?>"><p><?php echo $product->name; ?></p></a>
                <a data-id="<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i
                        class="fa fa-shopping-cart"></i><?php echo lang('msg_add_to_cart'); ?></a>
            </div>
        </div>
    </div>
</div>