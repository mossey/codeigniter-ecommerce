<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php $this->load->view('partials/main_sidebar'); ?>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <?php if (!empty($product->image)) { ?>
                            <div class="view-product">
                                <img src="<?php echo site_url('img.php?src=uploads/'.$product->image.'&w=330&h=380'); ?>" alt="<?php echo $product->name; ?>" />
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <h2><?php echo $product->name; ?></h2>
                            <p><?php echo lang('msg_views'); ?>: <?php echo $product->views; ?></p>

                            <span style="display:block">
                                <span style="float:none"><?php echo $product->price; ?></span>
                            </span>
                            <span style="margin-top:5px">
                                <label style="font-size:22px"><?php echo lang('msg_quantity'); ?>:</label>
                                <input type="text" value="1" class="quantity"/>
                                <br>
                                <button type="button" class="btn cart add-to-cart" data-id="<?php echo $product->id; ?>"
                                        style="color:#fff!important;font-size: 26px;margin: 5px 0 20px 0;">
                                    <i class="fa fa-shopping-cart"></i>
                                    <?php echo lang('msg_add_to_cart'); ?>
                                </button>
                            </span>
                            <p><b><?php echo lang('msg_available'); ?>:</b> <?php echo $product->active ? lang('msg_available') : lang('msg_not_available'); ?></p>
                            <?php if (!empty($product->categories)) { ?>
                                <?php foreach ($product->categories as $category) { ?>
                                    <p><b><?php echo $category['category_name']; ?></b> : <?php echo implode(', ', $category['filter_names']); ?></p>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="category-tab shop-details-tab">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab"><?php echo lang('msg_details'); ?></a></li>

                            <?php if (!empty($general->product_delivery)) { ?>
                                <li><a href="#delivery" data-toggle="tab"><?php echo lang('msg_delivery'); ?></a></li>
                            <?php } ?>

                            <li><a href="#reviews" data-toggle="tab"><?php echo lang('msg_comments'); ?> <?php echo !empty($comments) ? '('.count($comments).')' : ''; ?></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details">
                            <p style="padding:0 20px 10px 20px"><?php echo $product->description; ?></p>
                        </div>

                        <div class="tab-pane fade" id="delivery" >
                            <p style="padding:0 20px 10px 20px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo nemo quidem reprehenderit veritatis. Accusamus cumque eligendi explicabo itaque iure maiores neque quo? Accusantium adipisci asperiores consequatur dolor ipsum magnam, sequi! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid deserunt est fuga id illo in, iste magnam neque nobis non odio quam quasi quisquam reprehenderit similique suscipit tempora voluptatum.</p>
                        </div>

                        <div class="tab-pane fade" id="reviews" >
                            <div class="col-sm-12">
                                <?php if (!empty($comments)) { ?>
                                    <?php foreach ($comments as $comment) { ?>
                                        <div class="comment">
                                            <ul>
                                                <li><i class="fa fa-user"></i><?php echo $comment->name; ?></li>
                                                <li><i class="fa fa-clock-o"></i><?php echo date('H : i', strtotime($comment->date)); ?></li>
                                                <li><i class="fa fa-calendar"></i><?php echo date('d M, Y', strtotime($comment->date)); ?></li>
                                            </ul>
                                            <p><?php echo $comment->message; ?></p>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <p><?php echo lang('msg_no_comments'); ?></p>
                                <?php } ?>
                                <br>

                                <div class="add-comment">
                                    <p><b><?php echo lang('msg_add_comment'); ?></b></p>

                                    <form action="<?php echo site_url('user/comment'); ?>" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $product->id; ?>" />

                                        <?php if (empty($user)) { ?>
                                            <span>
                                                <input type="text" name="name" placeholder="<?php echo lang('msg_name'); ?>"/>
                                                <input type="email" name="email" placeholder="<?php echo lang('msg_email'); ?>"/>
										    </span>
                                        <?php } ?>

                                        <textarea name="message" placeholder="<?php echo lang('msg_message'); ?>"></textarea>

                                        <button type="submit" class="btn btn-default pull-right"><?php echo lang('msg_send'); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php if (!empty($recommended_products)) { ?>
                    <div class="recommended_items">
                        <h2 class="title text-center">Produse recomandate</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php foreach ($recommended_products as $product) { ?>
                                        <?php $this->load->view('partials/product', ['product' => $product]); ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>