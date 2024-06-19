<?php include 'header_browse.php';?>
<style>
table{
	background-color: rgb(243, 243, 243);
}
.isDisabled {
	color: currentColor;
	cursor: not-allowed;
	opacity: 0.5;
	text-decoration: none;
}
</style>
<div class="container" style="margin-top: 50px; background-color: #000000">
	<div class="row">
		<div class="col-lg-12"> 
			<h3 class="black_text" style="background-color: #000000; color:white; text-align: center; font-size:48px; font-weight:bold;" >Your Movie Journey Begins Here</h3>
		</div>
		<div class="col-lg-12">
			<h4 class="black_text" style="background-color: #000000; color:white; text-align: center;">Discover, watch, and fall in love with movies again. Select from our flexible subscription plans and start your cinematic adventure today with Mossy</h4>
			<table class="table table-striped table-hover" style="color: #000000; margin-top: 50px; border-radius: 10px; overflow: hidden;">
				<tbody>
					<tr style="background-color: #FF0000">
						<td>
							<h6 style="font-weight:">Packages</h6>
						</td>
						<?php
						$plans = $this->crud_model->get_active_plans();
						foreach ($plans as $row):
							?>
							<td align="center">
								<h5 style="text-transform: uppercase;"><?php echo $row['name'];?></h5>
							</td>
						<?php endforeach;?>
					</tr>
					<tr style="background-color: #444444; color:white;">
						<td>Monthly price</td>
						<?php
						$plans = $this->crud_model->get_active_plans();
						foreach ($plans as $row):
							?>
							<td align="center"> <?php echo currency($row['price']);?></td>
						<?php endforeach;?>
					</tr>
					<tr style="background-color: #333333; color:white;">
						<td>Screens you can watch on at the same time</td>
						<?php
						$plans = $this->crud_model->get_active_plans();
						foreach ($plans as $row):
							?>
							<td align="center"><?php echo $row['screens'];?></td>
						<?php endforeach;?>
					</tr>
					<tr style="background-color: #444444; color:white;">
						<td>Watch on your laptop, TV, phone and tablet</td>
						<?php
						$plans = $this->crud_model->get_active_plans();
						foreach ($plans as $row):
							?>
							<td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>
						<?php endforeach;?>
					</tr>
					<tr style="background-color: #333333; color:white;">
						<td>HD available</td>
						<?php
						$plans = $this->crud_model->get_active_plans();
						foreach ($plans as $row):
							?>
							<td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>
						<?php endforeach;?>
					</tr>
					<tr style="background-color: #444444; color:white;">
						<td>Unlimited movies and TV shows</td>
						<?php
						$plans = $this->crud_model->get_active_plans();
						foreach ($plans as $row):
							?>
							<td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>
						<?php endforeach;?>
					</tr>
					<tr style="background-color: #333333; color:white;">
						<td>Cancel anytime</td>
						<?php
						$plans = $this->crud_model->get_active_plans();
						foreach ($plans as $row):
							?>
							<td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>
						<?php endforeach;?>
					</tr>
					<tr style="background-color: #444444; color:white;">
						<td></td>
						<?php
						$plans = $this->crud_model->get_active_plans();
						foreach ($plans as $row):
							?>
							<td align="center">
								<input type="radio" name="plan_id" value="<?php echo $row['plan_id'];?>" />
							</td>
						<?php endforeach;?>
					</tr>
				</tbody>
			</table>
			<div class="pull-right">
				<a href="<?php echo base_url();?>index.php?browse/youraccount" class="btn btn-default">Go Back</a>
				<a href="javascript:" class="btn btn-primary" id="checkoutButton" onclick="checkPlan()">Checkout</a>
			</div>
		</div>
		<script>
		function checkPlan() {
			var selectedPlanId = $('input[name=plan_id]:checked').val();
			if (selectedPlanId > 0) {
				var redirectionUrl = "<?php echo base_url('index.php?browse/checkout/');?>" + selectedPlanId;
				window.location = redirectionUrl;
			}else{
				alert('<?php echo get_phrase('you_have_to_select_at_least_one_plan'); ?>');
			}
		}
		</script>
	</div>
	<hr>
	<?php include 'footer.php';?>
</div>
