<section style="margin: 25px 0 100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="login-form">
                    <h1><?php echo lang('msg_profile'); ?></h1>
                    <form action="<?php echo site_url('user/save'); ?>" method="post">
                        <input type="text" name="name" value="<?php echo $user->name; ?>" placeholder="<?php echo lang('msg_name'); ?>" />
                        <input type="email" name="email" value="<?php echo $user->email; ?>" placeholder="<?php echo lang('msg_email'); ?>" />
                        <input type="text" name="telephone" value="<?php echo $user->telephone; ?>" placeholder="<?php echo lang('msg_telephone'); ?>" />
                        <input type="text" name="address" value="<?php echo $user->address; ?>" placeholder="<?php echo lang('msg_address'); ?>" />
                        <br>
                        <h4><?php echo lang('msg_change_password'); ?></h4>
                        <input type="password" name="old_password" placeholder="<?php echo lang('msg_old_password'); ?>" />
                        <input type="password" name="new_password" placeholder="<?php echo lang('msg_new_password'); ?>" />
                        <input type="password" name="confirm_new_password" placeholder="<?php echo lang('msg_page'); ?>" />
                        <br>
                        <span>
                            <input type="checkbox" name="subscribed" value="1" <?php echo $user->subscribed ? 'checked' : ''; ?> class="checkbox">
                            <?php echo lang('msg_accept_newsletter'); ?>
                        </span>

                        <button type="submit" class="btn btn-default"><?php echo lang('msg_save'); ?></button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <br><br>
                <br><br>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea facilis inventore officiis quam velit?
                </p>
                <p>
                    Ad aperiam consectetur dignissimos doloremque dolorum facilis fugit, inventore ipsam laborum magnam porro sed sunt tempora.
                </p>
            </div>
        </div>
    </div>
</section>