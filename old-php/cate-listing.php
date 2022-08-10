<?php include 'includes/header-link.php';
include 'db_connect.php';
?>





<div id="main-wrapper">


    <!-- Start Navigation -->
    <?php include 'includes/header2.php' ?>
    <!-- End Navigation -->




    <section class="space min gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="mb-0 theme-cl">All Listing</h6>
                        <h2 class="ft-bold">Companies</h2>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                    <?php include 'filter.php' ?>
                    <!-- Sidebar End -->

                </div>


                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">

                    <!-- row -->
                    <div class="row justify-content-center gx-3">


                        <?php

                        $category_id = $_GET['list'];
                       
                        
                        $services = "SELECT * FROM website_subservice where service_id = {$category_id}";
                        $res = mysqli_query($conn, $services) or die("Query Unsuccessful.");
                        if (mysqli_num_rows($res) > 0) {

                            while ($serv = mysqli_fetch_assoc($res)) {
                        ?>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="Goodup-grid-wrap">
                                        <div class="Goodup-grid-upper">
                                            <div class="Goodup-pos ab-left">
                                                <?php
                                                if ($serv['featured'] == 0) {
                                                ?>
                                                    <div class="Goodup-featured-tag">Featured</div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="Goodup-grid-thumb">
                                                <a href="" class="d-block text-center m-auto"><img src="assets/images/default-image.png" class="img-fluid" alt=""></a>
                                            </div>

                                        </div>
                                        <div class="Goodup-grid-fl-wrap">
                                            <div class="Goodup-caption px-3 py-2">

                                                <h4 class="mb-0 ft-medium medium"><a href="" class="text-dark fs-md"><?php echo $serv['name'] ?></a></h4>
                                                <div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>Delhi, India</div>
                                                <div class="Goodup-middle-caption mt-3">
                                                    <!-- <p> <?php echo $serv['description'] ?> </p> -->
                                                    <p> <?php echo mb_strimwidth($serv['description'], 0, 40, "...") ?> </p>
                                                </div>
                                            </div>
                                            <div class="Goodup-grid-footer py-2 px-3">
                                                <div class="Goodup-author"><a href="author-detail.html"><img src="assets/images/user_logo.png" class="img-fluid circle" alt=""></a></div>
                                                <div class="Goodup-ft-first">
                                                    <a href="" class="Goodup-cats-wrap">
                                                        <div class="cats-ico bg-5"><i class="lni lni-eye"></i></div><span class="cats-title">View Now</span>
                                                    </a>
                                                </div>
                                                <div class="Goodup-ft-last">
                                                    <div class="Goodup-inline">

                                                        <div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-heart-filled position-absolute"></i></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        <?php
                            }
                        }
                        ?>

                    </div>
                    <!-- /row -->





                </div>



            </div>
            <!-- row -->

        </div>
    </section>

    <section class="space min">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="sec_title position-relative text-center mb-4">
						<h6 class="theme-cl mb-0">Latest Blogs</h6>
						<h2 class="ft-bold">Pickup New Updates</h2>
					</div>
				</div>
			</div>

			<div class="row justify-content-center">

				<?php
				$blog_selt = "SELECT * FROM `blog`";
				$result = mysqli_query($conn, $blog_selt) or die("Query Failed");
				if (mysqli_num_rows($result) > 0) {
					while ($blog = mysqli_fetch_assoc($result)) {
				?>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="gup_blg_grid_box">
								<div class="gup_blg_grid_thumb">
									<a href=""><img src="uploads/blogs/<?php echo 'blog-min.jpg'; ?>" class="img-fluid" alt=""></a>
								</div>
								<div class="gup_blg_grid_caption">

									<div class="blg_title">
										<h4><a href=""><?php echo $blog['blog_name']; ?></a></h4>
									</div>
									<div class="blg_desc">
										<p><?php echo $blog['blog_content']; ?></p>
									</div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex br-top px-3 py-2">
										<div class="crs_fl_last">
											<div class="foot_list_info">
												<ul class="blog_ul">
													<li>
														<div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
														<a href="">Read More</a>
													</li>
													<li class="text-right">
														<div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
														<div class="elsio_tx"><?php echo date_format(date_create($blog['created_date']), 'd M ,Y') ?></div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>
				<!-- Single Item -->



			</div>

			<div class="flex-box">
				<a href="blog.php" class="btn btn-md rounded hover-theme home_btn">View More<i class="lni lni-arrow-right-circle ms-2"></i></a>
			</div>

		</div>
	</section>

    <?php include 'includes/footer.php' ?>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php include 'includes/footer-link.php' ?>