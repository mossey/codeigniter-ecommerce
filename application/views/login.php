<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <h2><?php echo lang('msg_login'); ?></h2>
                    <form action="<?php echo site_url('user/login'); ?>" method="post">
                        <input required type="email" name="email" placeholder="<?php echo lang('msg_email'); ?>" />
                        <input required type="password" name="password" placeholder="<?php echo lang('msg_password'); ?>" />
							<span>
								<input type="checkbox" name="remember" value="1" class="checkbox">
                                <?php echo lang('msg_remember_me'); ?>
							</span>
                        <button type="submit" class="btn btn-default"><?php echo lang('msg_login'); ?></button>
                    </form>
                </div>
            </div>
            <div class="col-sm-1">
                <h2 class="or"><?php echo lang('msg_or'); ?></h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <h2><?php echo lang('msg_register'); ?></h2>
                    <form action="<?php echo site_url('user/register'); ?>" method="post">
                        <input required type="text" name="name" placeholder="<?php echo lang('msg_name'); ?>"/>
                        <input required type="email" name="email" placeholder="<?php echo lang('msg_email'); ?>"/>
                        <input required type="text" name="telephone" placeholder="<?php echo lang('msg_telephone'); ?>"/>
                        <input required type="text" name="address" placeholder="<?php echo lang('msg_address'); ?>"/>
                        <input required type="password" name="password" placeholder="<?php echo lang('msg_password'); ?>"/>
                        <button type="submit" class="btn btn-default"><?php echo lang('msg_register'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>