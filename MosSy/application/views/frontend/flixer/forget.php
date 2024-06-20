<!-- TOP LANDING SECTION -->
<div style="height:100%;width:100%;background-image: url(<?php echo base_url().'assets/frontend/'.$selected_theme;?>/images/screen_bg.png)">
	
	<!-- logo -->
	<div style="float: left;">
		<a href="<?php echo base_url();?>index.php?home">
			<img src="<?php echo base_url();?>/assets/global/logo2.png" style="margin: 18px 40px; height: 50px;" />
		</a>
	</div>
	<form action="<?php echo base_url();?>index.php?home/forget" method="post">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4" style="clear: both; margin: 150px 25% 25% 33% ">
				<div style="background-color: rgba(0, 0, 0, 0.8); padding: 30px; border-radius: 10px;">
					<?php 
					if ($this->session->flashdata('password_reset') == 'failed'):
					?>
						<!-- ERROR MESSAGE -->
						<div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  	<?php echo get_phrase('Email_not_found');?>
						</div>
					<?php endif;?>
					
					<?php 
					if ($this->session->flashdata('password_reset') == 'success'):
					?>
						<!-- SUCCESS MESSAGE -->
						<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  	<?php echo get_phrase('Password_sent_to_your_email');?>
						  <a href="<?php echo base_url();?>index.php?home/signin"><?php echo get_phrase('sign_in');?></a>
						</div>
					<?php endif;?>

					<h3 class="black_text" style="background-color: black; color: white; padding: 10px 0; border-radius: 5px; font-weight:bold;"><?php echo get_phrase('Forgot_Email/_Password');?></h3>
					<?php echo get_phrase('Enter_your_email_address. We_will_send_you_a_temporary_password.');?>
					<div class="black_text" style="margin-top: 20px; background-color: black; color: white;  border-radius: 5px; padding: 10px 0 ">
					<?php echo get_phrase('Email');?> 
					</div>
					<div class="black_text">
						<input type="email" name="email" style="padding: 10px; width: 100%; background-color: rgba(0, 0, 0, 0.9); color: white; border: 1px solid #A3A3A3; border-radius: 5px;"" />
					</div>
					<button type="submit" class="btn btn-primary" style=" width: 100%; height: 50px; margin: 20px 0px; background-color: red; border-radius: 5px;"><?php echo get_phrase('Email_me');?></button>
					<hr>
					<a href="<?php echo base_url();?>index.php?home/forget"><?php echo get_phrase('Forget_password');?>?</a>
					|
					<a href="<?php echo base_url();?>index.php?home/signin"><?php echo get_phrase('Sign_In');?></a>
				</div>
			</div>
		</div>
	</form>
</div>

