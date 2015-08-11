<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php $this->load->view('partials/main_sidebar'); ?>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center"><?php echo lang('msg_page'); ?></h2>

                    <h3><?php echo $page->{'title_'.$language}; ?></h3>

                    <div class="single-blog-post">
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-clock-o"></i> <?php echo date('H : i', strtotime($page->date)); ?>
                                </li>
                                <li><i class="fa fa-calendar"></i> <?php echo date('d M, Y', strtotime($page->date)); ?>
                                </li>
                            </ul>
                        </div>

                        <?php if (!empty($page->image)) { ?>
                            <img src="" alt=""/>
                        <?php } ?>

                        <p><?php echo nl2br($page->{'content_'.$language}); ?><p>
                    </div>
                </div>

                <div class="response-area">
                    <h2><?php echo !empty($comments) ? count($comments) : '0'; ?> <?php echo lang('msg_comments'); ?></h2>
                    <ul class="media-list">
                        <?php if (!empty($comments)) { ?>
                            <?php foreach ($comments as $comment) { ?>
                                <li class="media">
                                    <div class="media-body">
                                        <ul class="sinlge-post-meta">
                                            <li><i class="fa fa-user"></i> <?php echo $comment->name; ?></li>
                                            <li><i class="fa fa-clock-o"></i> <?php echo date('H : i', strtotime($page->date)); ?></li>
                                            <li><i class="fa fa-calendar"></i> <?php echo date('d M, Y', strtotime($page->date)); ?></li>
                                        </ul>
                                        <p><?php echo $comment->message; ?></p>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="replay-box">
                    <input type="hidden" name="page_id" value="<?php echo $page->id; ?>" />

                    <?php if (!empty($user)) { ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-area">
                                    <div class="blank-arrow">
                                        <label><?php echo lang('msg_message'); ?></label>
                                    </div>
                                    <span>*</span>
                                    <textarea name="message" rows="5"></textarea>
                                    <button type="submit" class="btn btn-primary"><?php echo lang('msg_submit'); ?></button>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <h2><?php echo lang('msg_add_comment'); ?></h2>

                                <form method="post" action="<?php echo site_url('user/comment'); ?>">
                                    <div class="blank-arrow">
                                        <label><?php echo lang('msg_name'); ?></label>
                                    </div>
                                    <span>*</span>
                                    <input type="text" name="name" required>

                                    <div class="blank-arrow">
                                        <label><?php echo lang('msg_email'); ?></label>
                                    </div>
                                    <span>*</span>
                                    <input type="text" name="email" required>
                                </form>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-area">
                                    <div class="blank-arrow">
                                        <label><?php echo lang('msg_message'); ?></label>
                                    </div>
                                    <span>*</span>
                                    <textarea name="message" rows="5" required></textarea>
                                    <button tyoe="submit" class="btn btn-primary"><?php echo lang('msg_submit'); ?></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>