<style>
	@media screen and (max-width: 765px) {
		.mobile_vedio_player {
			width: 100%;
			height: 220px;
		}

		.mobile_vedio_player_html {
			width: 100%;
		}
	}

	@media screen and (min-width: 766px) {
		.mobile_vedio_player {
			width: 100%;
			height: 585px;
		}

		.mobile_vedio_player_html {
			width: 100%;
		}
	}
</style>
<?php include 'header_browse.php'; ?>
<?php $user_id = $this->session->userdata('user_id'); ?>
<?php $active_user = $this->session->userdata('active_user'); ?>
<?php
$movie_details = $this->db->get_where('movie', array('movie_id' => $movie_id))->result_array();
foreach ($movie_details as $row):
	?>


	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() . 'assets/frontend/' . $selected_theme; ?>/hovercss/demo.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() . 'assets/frontend/' . $selected_theme; ?>/hovercss/set1.css" />
	<style>
		.movie_thumb {}

		.btn_opaque {
			font-size: 20px;
			border: 1px solid #939393;
			text-decoration: none;
			margin: 10px;
			background-color: rgba(0, 0, 0, 0.74);
			color: #fff;
		}

		.btn_opaque:hover {
			border: 1px solid #939393;
			text-decoration: none;
			background-color: rgba(57, 57, 57, 0.74);
			color: #fff;
		}

		.video_cover {
			position: relative;
			padding-bottom: 30px;
		}

		.video_cover:after {
			content: "";
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			background-image: url(<?php echo $this->crud_model->get_poster_url('movie', $row['movie_id']); ?>);
			width: 100%;
			height: 100%;
			opacity: 0.2;
			z-index: -1;
			background-size: cover;
		}

		.select_black {
			background-color: #000;
			height: 45px;
			padding: 12px;
			font-weight: bold;
			color: #fff;
		}

		.profile_manage {
			font-size: 25px;
			border: 1px solid #ccc;
			padding: 5px 30px;
			text-decoration: none;
		}

		.profile_manage:hover {
			font-size: 25px;
			border: 1px solid #fff;
			padding: 5px 30px;
			text-decoration: none;
			color: #fff;
		}

		.card-body {
			padding: 20px;
			background-color: #1f1f1f;
			color: #ffffff;
			border-radius: 20px;
		}
	</style>
	<!-- VIDEO PLAYER -->

	<div class="video_cover">
		<div class="container" style="padding-top:100px; text-align: center;">
			<div class="row">

				<!--Main movie-->
				<?php include 'main_movie.php'; ?>


				<!--Trailer-->
				<?php include 'trailer.php'; ?>
			</div>
		</div>
	</div>
	<!-- VIDEO DETAILS HERE -->
	<div class="container" style="margin-top: 30px;">
		<div class="column">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-xl-9">
						<!-- VIDEO TITLE -->
						<h3 style="font-size: 50px; font-weight: bold;">
							<?php echo $row['title']; ?>
						</h3>
					</div>
					<!-- MOVIE YEAR -->
					<div>
						<strong><?php echo get_phrase('Year'); ?></strong> : <?php echo $row['year']; ?>
					</div>
				</div>
			</div>
			<script>
				// submit the add/delete request for mylist
				// type = movie/series, task = add/delete, id = movie_id/series_id
				function process_list(type, task, id) {
					$.ajax({
						url: "<?php echo base_url(); ?>index.php?browse/process_list/" + type + "/" + task + "/" + id,
						success: function (result) {
							//alert(result);
							if (task == 'add') {
								$("#mylist_button_holder").html($("#mylist_delete_button").html());
							} else if (task == 'delete') {
								$("#mylist_button_holder").html($("#mylist_add_button").html());
							}
						}
					});
				}

				// Show the add/delete wishlist button on page load
				$(document).ready(function () {
					// Checking if this movie_id exist in the active user's wishlist
					mylist_exist_status = "<?php echo $this->crud_model->get_mylist_exist_status('movie', $row['movie_id']); ?>";

					if (mylist_exist_status == 'true') {
						$("#mylist_button_holder").html($("#mylist_delete_button").html());
					} else if (mylist_exist_status == 'false') {
						$("#mylist_button_holder").html($("#mylist_add_button").html());
					}
				});
			</script>
			<div class="col-lg-5">
				<button class="btn btn-danger btn-md" id='watch_button'
					style="font-size: 16px; margin-top: 20px; margin-right:20px; border-radius: 4px;" onclick="divToggle()">
					<i class="fa fa-eye"></i> <?php echo get_phrase('watch_trailer'); ?>
				</button>
				<!-- ADD OR DELETE FROM PLAYLIST -->
				<span id="mylist_button_holder">
				</span>
				<span id="mylist_add_button" style="display:none;">
					<a href="#" class="btn btn-danger btn-md"
						style="font-size: 16px; margin-top: 20px; border-radius: 4px; background-color: rgba(0, 0, 0, 0.1); border: 1px solid #939393;"
						onclick="process_list('movie', 'add', <?php echo $row['movie_id']; ?>)">
						<i class="fa fa-plus"></i> <?php echo get_phrase('Add_to_My_list'); ?>
					</a>
				</span>
				<span id="mylist_delete_button" style="display:none;">
					<a href="#" class="btn btn-default btn-md"
						style="font-size: 16px; margin-top: 20px; border-radius: 4px; background-color: rgba(0, 0, 0, 0.1); border: 1px solid #939393;"
						onclick="process_list('movie', 'delete', <?php echo $row['movie_id']; ?>)">
						<i class="fa fa-check"></i> <?php echo get_phrase('Added_to_My_list'); ?>
					</a>
				</span>
				<!-- MOVIE GENRE
				<div style="margin-top: 10px;">
				<strong><?php echo get_phrase('Genre'); ?></strong> :
				<a href="<?php echo base_url(); ?>index.php?browse/movie/<?php echo $row['genre_id']; ?>">
					<?php echo $this->db->get_where('genre', array('genre_id' => $row['genre_id']))->row()->name; ?>
				</a>
				</div> -->

				<!-- RATING CALCULATION -->
				<div style="margin-top: 20px; font-size:20px">
					<?php echo $row['rating']; ?>
					<?php for ($i = 1; $i <= $row['rating']; $i++): ?>
						<i class="fa fa-star" aria-hidden="true" style="color: #e2cc0c;"></i>
					<?php endfor; ?>
					<?php for ($i = 5; $i > $row['rating']; $i--): ?>
						<i class="fa fa-star-o" aria-hidden="true"></i>
					<?php endfor; ?>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top:20px;">
			<div class="col-lg-12">
				<div class="bs-component">
					<!-- ABOUT SECTION -->
					<div style="width: 100%; margin-bottom: 20px;">
						<h3><?php echo get_phrase('About'); ?></h3>
						<p><?php echo $row['description_long']; ?></p>
					</div>

					<!-- CAST SECTION -->
					<div style="width: 100%; margin-bottom: 20px;">
						<h3><?php echo get_phrase('Cast'); ?></h3>
						<div style="display: flex; flex-wrap: wrap;">
							<?php
							$actors = json_decode($row['actors']);
							foreach ($actors as $actor) {
								?>
								<div style="text-align:center; color: #fff; font-weight: bold; margin: 5px;">
									<img src="<?php echo $this->crud_model->get_actor_image_url($actor); ?>"
										style="height: 160px; margin:5px;" />
									<br>
									<a href="<?php echo base_url('index.php?browse/filter/movie/all/' . $actor . '/all/all'); ?>"
										style="color: white;"><?php echo $this->db->get_where('actor', ['actor_id' => $actor])->row()->name; ?></a>
								</div>
								<?php
							}
							?>
						</div>
					</div>

					<!-- DIRECTOR SECTION -->
					<div style="width: 100%; margin-bottom: 20px;">
						<h3><?php echo get_phrase('Director'); ?></h3>
						<div style="text-align:left; color: #fff; font-weight: bold;">
							<?php $director_id = $this->db->get_where('director', ['director_id' => $row['director']])->row()->director_id; ?>
							<img src="<?php echo base_url('assets/global/director/' . $director_id . '.jpg'); ?>"
								style="height: 160px; margin:5px;" />
							<br>
							<?php echo $this->db->get_where('director', ['director_id' => $row['director']])->row()->name; ?>
						</div>
					</div>
					
					<!-- REVIEW SECTION -->
					<div>
						<h3><?php echo get_phrase('Reviews'); ?></h3>
						<!-- Samakan dengan yang ada di cast section untuk akses database -->
						<div class="swiper">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper d-flex">
								<!-- Slides -->
								<div class="swiper-slide">
									<div class="card" style="width: 45rem;">
										<div class="card-body">
											<h5 class="card-title">Fadhly</h5>
											<h6 class="card-subtitle text-muted">Jakarta, Indonesia</h6>
											<p class="card-text">The movie is absolutely phenomenal. 
												The actor delivers a stunning performance, bringing each 
												character to life with remarkable skill. The viewing 
												experience evokes deep emotions in the audience, immersing 
												them in every moment of tension and feeling throughout the 
												film
											</p>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="card" style="width: 45rem;">
										<div class="card-body">
											<h5 class="card-title">Khosyi</h5>
											<h6 class="card-title">Jakarta, Indonesia</h6>
											<p class="card-text">The movie is absolutely phenomenal. 
												The actor delivers a stunning performance, bringing each 
												character to life with remarkable skill. The viewing 
												experience evokes deep emotions in the audience, immersing 
												them in every moment of tension and feeling throughout the 
												film
											</p>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="card" style="width: 45rem;">
										<div class="card-body">
											<h5 class="card-title">Abi</h5>
											<h6 class="card-subtitle text-muted">Jakarta, Indonesia</h6>
											<p class="card-text">The movie is absolutely phenomenal. 
												The actor delivers a stunning performance, bringing each 
												character to life with remarkable skill. The viewing 
												experience evokes deep emotions in the audience, immersing 
												them in every moment of tension and feeling throughout the 
												film
											</p>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="card" style="width: 45rem;">
										<div class="card-body">
											<h5 class="card-title">Arya</h5>
											<h6 class="card-subtitle text-muted">Jakarta, Indonesia</h6>
											<p class="card-text">The movie is absolutely phenomenal. 
												The actor delivers a stunning performance, bringing each 
												character to life with remarkable skill. The viewing 
												experience evokes deep emotions in the audience, immersing 
												them in every moment of tension and feeling throughout the 
												film
											</p>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="card" style="width: 45rem;">
										<div class="card-body">
											<h5 class="card-title">Tama</h5>
											<h6 class="card-subtitle text-muted">Jakarta, Indonesia</h6>
											<p class="card-text">The movie is absolutely phenomenal. 
												The actor delivers a stunning performance, bringing each 
												character to life with remarkable skill. The viewing 
												experience evokes deep emotions in the audience, immersing 
												them in every moment of tension and feeling throughout the 
												film
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- MORE SECTION
					<div style="width: 100%; margin-bottom: 20px;">
					<h3><?php echo get_phrase('More'); ?></h3>
					<div style="display: flex; flex-wrap: wrap;">
						<?php
							$movies = $this->crud_model->get_movies($row['genre_id'], 10, 0);
							foreach ($movies as $movie) {
								$title = $movie['title'];
								$link = base_url() . 'index.php?browse/playmovie/' . $movie['movie_id'];
								$thumb = $this->crud_model->get_thumb_url('movie', $movie['movie_id']);
								?>
							<div style="margin: 5px;">
								<a href="<?php echo $link; ?>">
								<img src="<?php echo $thumb; ?>" style="height: 160px; margin:5px;" />
								<p style="color: white; text-align: center;"><?php echo $title; ?></p>
								</a>
							</div>
							<?php
							}
							?>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<hr style="border-top:1px solid #333;">
		<?php include 'footer.php'; ?>
	</div>
<?php endforeach; ?>

<script type="text/javascript">
	function divToggle() {
		if ($('#trailer_div').hasClass('hidden')) {
			$('#trailer_div').removeClass('hidden');
			$('#movie_div').addClass('hidden');
			$('#watch_button').html('<?php echo '<i class="fa fa-eye"></i> ' . get_phrase('watch_movie') ?>');
			player.pause();
		} else {
			$('#movie_div').removeClass('hidden');
			$('#trailer_div').addClass('hidden');
			$('#watch_button').html('<?php echo '<i class="fa fa-eye"></i> ' . get_phrase('watch_trailer') ?>');
			trailer_url.pause();
		}
		$("html, body").animate({ scrollTop: 0 }, 500);
	}
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
	var swiper = new Swiper(".swiper", {
		slidesPerView: 1,
		spaceBetween: 10,
		loop: false,
		centeredSlides: false,
		breakpoints: {
			1024: {
				slidesPerView: 2,
			}
		}
	});
</script>

<script language="javascript" type="text/javascript" src="jquery-1.8.2.js"></script>
<script language="javascript" type="text/javascript">

	// $(function(){
	//     $('#watch_button').click(function(){
	//         $('iframe').attr('src', $('iframe').attr('src'));
	//     });
	// });
</script>