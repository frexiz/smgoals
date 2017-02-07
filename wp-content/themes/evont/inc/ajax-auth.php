<?php $id='-'.rand(0,1000); ?>
<form id="login" class="jx-evont-auth" action="login" method="post">
    <h3><?php esc_html_e('New to site?','evont');?> <a class="login_button show_signup" id="show_signup_button" href=""><?php esc_html_e('Create an Account','evont');?></a></h3>
    <hr />
    <h1><?php esc_html_e('Login','evont');?></h1>
    <p class="status"></p>  
    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>  
    <label for="username<?php echo esc_attr($id); ?>"><?php esc_html_e('Username','evont');?></label>
    <input id="username<?php echo esc_attr($id); ?>" type="text" class="required" name="username" data-validation="required">
    <label for="password<?php echo esc_attr($id); ?>"><?php esc_html_e('Password','evont');?></label>
    <input id="password<?php echo esc_attr($id); ?>" type="password" class="required" name="password" data-validation="required">
    <a class="text-link" href="#"><?php esc_html_e('Lost password?','evont');?></a>
    <input class="submit_button" type="submit" value="<?php esc_html_e('LOGIN','evont');?>">
	<a class="close" href="">(<?php esc_html_e('X','evont');?>)</a>    
</form>
 
<form id="register" class="jx-evont-auth"  action="register" method="post">
	<h3><?php esc_html_e('Already have an account?','evont');?> <a class="login_button show_login" id="show_login"  href=""><?php esc_html_e('Login','evont');?></a></h3>
    <hr />
    <h1><?php esc_html_e('Signup','evont');?></h1>
    <p class="status"></p>
    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>         
    <label for="signonname<?php echo esc_attr($id); ?>"><?php esc_html_e('Username','evont');?></label>
    <input id="signonname<?php echo esc_attr($id); ?>" type="text" name="signonname" class="required" data-validation="required">
    <label for="email<?php echo esc_attr($id); ?>"><?php esc_html_e('Email','evont');?></label>
    <input id="email<?php echo esc_attr($id); ?>" type="text" class="required email" name="email" data-validation="required" data-validation="email">
    <label for="signonpassword<?php echo esc_attr($id); ?>"><?php esc_html_e('Password','evont');?></label>
    <input id="signonpassword<?php echo esc_attr($id); ?>" type="password" class="required" name="signonpassword" data-validation="required">
    <label for="password2<?php echo esc_attr($id); ?>"><?php esc_html_e('Confirm Password','evont');?></label>
    <input type="password" id="password2<?php echo esc_attr($id); ?>" class="required" name="password2" data-validation="required">
    <input class="submit_button" type="submit" value="<?php esc_html_e('SIGNUP','evont');?>">
    <a class="close" href="">(<?php esc_html_e('X','evont');?>)</a>    
</form>
