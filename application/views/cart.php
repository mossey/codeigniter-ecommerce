<style>
    .image-td {
        width: 150px;
        padding: 20px 15px!important;
        margin: 0;
    }
    .image-td img {
        margin:auto;
        display:block
    }
</style>
<form method="post" action="<?php echo site_url('products/checkout'); ?>" data-currency="<?php echo $general->currency; ?>" class="form-with-data">
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('/'); ?>"><?php echo lang('msg_home'); ?></a></li>
                    <li class="active"><?php echo lang('msg_cart'); ?></li>
                </ol>
            </div>
            <?php if (!empty($products)) { ?>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed" data-delivery-free-from="<?php echo !empty($general->delivery_free_from) ? $general->delivery_free_from : ''; ?>">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image image-td"><?php echo lang('msg_cart'); ?></td>
                            <td class="description"></td>
                            <td class="price"><?php echo lang('msg_price'); ?></td>
                            <td class="quantity"><?php echo lang('msg_quantity'); ?></td>
                            <td class="total"><?php echo lang('msg_total'); ?></td>
                            <td class="delete"></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product) { ?>
                            <?php $product->price = !empty($product->special_price) ? $product->special_price : $product->price; ?>

                            <tr data-price="<?php echo $product->price; ?>" data-id="<?php echo $product->id; ?>">
                                <td class="cart_product image-td">
                                    <a href="<?php echo site_url(url_title($product->{'name_'.$language}) . '-' . $product->id); ?>"><img
                                            src="<?php echo site_url('img.php?src=uploads/' . $product->image . '&h=100'); ?>" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4>
                                        <a href="<?php echo site_url(url_title($product->{'name_'.$language}) . '-' . $product->id); ?>"><?php echo $product->{'name_'.$language}; ?></a>
                                    </h4>

                                    <p><?php echo lang('msg_views'); ?>: <?php echo $product->views; ?></p>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo $product->price.' '.$general->currency; ?></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up"> + </a>
                                        <input class="cart_quantity_input" type="text"
                                               name="products[<?php echo $product->id; ?>][quantity]"
                                               value="<?php echo $product->quantity; ?>"
                                               autocomplete="off" size="4">
                                        <a class="cart_quantity_down"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"
                                       data-price="<?php echo $product->price * $product->quantity; ?>"><?php echo $product->price * $product->quantity.' '.$general->currency; ?></p>
                                </td>
                                <td class="cart_delete" style="overflow:visible">
                                    <a class="cart_quantity_delete" style="position: relative;top: -63px;left: -10px;"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <p>Nu aveti nici un produs in cos.</p>
            <?php } ?>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Ultima etapa. Cum doriti primirea comenzii?</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias asperiores dolorem doloremque dolores
                    dolorum earum facilis hic in, ipsam perferendis possimus quisquam rem, sit, suscipit velit. At enim
                    odio
                    quae?</p>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox" name="prefer[email]" value="Email">
                                <label><?php echo lang('msg_email'); ?></label>
                            </li>
                            <li>
                                <input type="checkbox" name="prefer[telephone]" value="Telefon">
                                <label><?php echo lang('msg_telephone'); ?></label>
                            </li>
                            <li>
                                <input type="checkbox" name="prefer[message]" value="Mesaj">
                                <label><?php echo lang('msg_message'); ?></label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field zip-field">
                                <label><?php echo lang('msg_name'); ?> * :</label>
                                <input type="text" name="name" value="<?php echo !empty($user->name) ? $user->name : ''; ?>" required>
                            </li>
                            <li class="single_field zip-field">
                                <label><?php echo lang('msg_email'); ?> * :</label>
                                <input type="email" name="email" required>
                            </li>
                            <li class="single_field zip-field">
                                <label><?php echo lang('msg_telephone'); ?> * :</label>
                                <input type="text" name="telephone" required>
                            </li>
                            <li class="single_field zip-field" style="width: 96%;">
                                <br>
                                <label><?php echo lang('msg_address'); ?> * :</label>
                                <input type="text" name="address" required>
                            </li>
                        </ul>
                        <div style="margin: 20px 25px 15px 40px;">
                            <label><?php echo lang('msg_message'); ?> :</label>
                            <textarea name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default check_out"><?php echo lang('msg_send'); ?></button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="total_area">
                        <ul>
                            <?php if (!empty($general->address)) { ?>
                                <li><?php echo lang('msg_address'); ?> <span><?php echo $general->address; ?></span></li>
                            <?php } ?>

                            <?php if (!empty($general->telephone)) { ?>
                                <li><?php echo lang('msg_telephone'); ?> <span><?php echo $general->telephone; ?></span></li>
                            <?php } ?>

                            <?php if (!empty($general->mobile)) { ?>
                                <li><?php echo lang('msg_mobile'); ?> <span><?php echo $general->mobile; ?></span></li>
                            <?php } ?>

                            <?php if (!empty($general->email)) { ?>
                                <li><?php echo lang('msg_email'); ?> <span><?php echo $general->email; ?></span></li>
                            <?php } ?>

                            <?php if (!empty($general->delivery)) { ?>
                                <li><?php echo lang('msg_delivery'); ?> <span><?php echo $general->delivery; ?></span></li>
                            <?php } ?>

                            <li><?php echo lang('msg_total'); ?> <span class="delivery-free" style="font-weight: bold;color: #65AE17;margin-left: 8px;display:none" data-delivery="<?php echo !empty($general->delivery_free_from) ? '+ '.$general->delivery_free_from.' '.$general->currency.' livrarea' : ''; ?>" data-free-delivery="+ livrarea gratisa"></span> <span class="total">N / A</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>