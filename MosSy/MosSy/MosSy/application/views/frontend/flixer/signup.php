<?php if(get_settings('recaptcha')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<!-- TOP LANDING SECTION -->
<div style="width:100%; height:90px; background-color:#000000; border-bottom:solid 1px #dcdde0;height:100%;width:100%; clear: both; background-image: url(<?php echo base_url().'assets/frontend/'.$selected_theme;?>/images/screen_bg.png)">
	<!-- logo -->
	<div style="float: left;">
		<a href="<?php echo base_url();?>index.php?home">
			<img src="<?php echo base_url();?>/assets/global/logo2.png" style="margin: 18px 40px; height: 50px;" />
		</a>
	</div>
	<?php if(addon_status('blog')): ?>
		<div style="float: right;margin: 18px 40px; height: 50px;">
			<a href="<?php echo base_url();?>index.php?addons/blog" class="" style="color: #e50914;font-weight: 700;font-size: 20px;"><?= get_phrase('blog'); ?></a>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-lg-5 col-lg-offset-4" style="clear: both; margin: 150px 25% 25% 30% ">
			<div style="background-color: rgba(0, 0, 0, 0.8); padding: 30px; border-radius: 15px; ">
				<?php 
					if ($this->session->flashdata('signup_result') == 'failed'):
					?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo get_phrase('Email_already_exists! Please_try_again');?>.
				</div>
				<?php endif;?>
				<form method="post" action="<?php echo base_url();?>index.php?home/signup">
						<h3 class="black_text" style="background-color: black; color: white; padding: 10px 0; border-radius: 5px; font-weight: bold;"><?php echo get_phrase('Sign_Up');?></h3>
						
						<div style="margin-top: 20px; background-color: black; color: white; padding: 10px 0 ">
							<?php echo get_phrase('Name');?>
						</div>
						<div class="black_text">
							<input required type="text" placeholder="Enter your name" name="name" style="padding: 10px; width: 100%; background-color: rgba(0, 0, 0, 0.9); color: white; border: 1px solid white; border-radius: 5px;" />
						</div>

						<div style="margin-top: 20px; background-color: black; color: white; padding: 10px 0 ">
							<?php echo get_phrase('Email_Address');?>
						</div>
						<div class="black_text">
							<input required type="email" placeholder="Enter your email" name="email" style="padding: 10px; width: 100%; background-color: rgba(0, 0, 0, 0.9); color: white; border: 1px solid white; border-radius: 5px;" autocomplete="off" />
						</div>
						
						<div style="margin-top: 20px; background-color: black; color: white; padding: 10px 0 ">
							<?php echo get_phrase('Password');?>
						</div>
						<div class="black_text">
							<input required type="password" placeholder="Enter your password" name="password" style="padding: 10px; width: 100%; background-color: rgba(0, 0, 0, 0.9); color: white; border: 1px solid white; border-radius: 5px;" />
						</div>
						<?php if(get_settings('recaptcha')): ?>
							<div class="form-group" style="margin:10px 0px 5px;">
							<div class="g-recaptcha" data-sitekey="<?php echo get_settings('recaptcha_sitekey'); ?>"></div>
							</div>
						<?php endif; ?>
						<button type="submit"  class="btn btn-primary" style=" width: 100%; margin: 20px 0px; height: 50px; border-radius: 5px; background-color: red">
							<?php echo get_phrase('Register');?></button>
					</form>
					<hr>
				<a href="<?php echo base_url();?>index.php?home/forget"><?php echo get_phrase('Forget_password');?>?</a>
				|
				<a href="<?php echo base_url();?>index.php?home/signin"><?php echo get_phrase('Sign_In');?></a>
			</div>
		</div>
	</div>
</div>

