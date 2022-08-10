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
                        <h6 class="mb-0 theme-cl">Popular Categories</h6>
                        <h2 class="ft-bold">Browse Top Categories</h2>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row align-items-center">


                <?php
                $sql_cat = "SELECT * FROM company_category";

                $result1 = mysqli_query($conn, $sql_cat) or die("Query Unsuccessful.");

                if (mysqli_num_rows($result1) > 0) {
                ?>
                    <?php
                    while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="cats-wrap text-center">
                                <a href="listing.php" class="Goodup-catg-wrap">
                                    <div class="Goodup-catg-caption">
                                        <h4 class="fs-md mb-0 ft-medium m-catrio"><?php
                                                                                    echo $row1['category'];
                                                                                    ?></h4>
                                        <?php
										$num = "SELECT * FROM website_subservice WHERE service_id = '" . $row1['cate_id'] . "'";

										$num_result = mysqli_query($conn, $num) or die("Query Unsuccessful.");
										$count = mysqli_num_rows($num_result);
										echo '<span class="text-muted">'.$count.' Listings</span>';
										?>	
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    </ul>
                <?php
                }
                ?>
               



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

				<!-- Single Item -->
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="gup_blg_grid_box">
						<div class="gup_blg_grid_thumb">
							<a href=""><img src="assets/img/b-4.jpg" class="img-fluid" alt=""></a>
						</div>
						<div class="gup_blg_grid_caption">
							<div class="blg_tag"><span>Marketing</span></div>
							<div class="blg_title">
								<h4><a href="">What Is a VPN and How Does It Work?</a></h4>
							</div>
							<div class="blg_desc">
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
							</div>
						</div>
						<div class="crs_grid_foot">
							<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
								<div class="crs_fl_first">
									<div class="crs_tutor">
										<div class="crs_tutor_thumb"><a href="javascript:void(0);"><img src="assets/img/team-2.jpg" class="img-fluid circle" width="35" alt=""></a></div>
									</div>
								</div>
								<div class="crs_fl_last">
									<div class="foot_list_info">
										<ul>
											<li>
												<div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
												<div class="elsio_tx">10k Views</div>
											</li>
											<li>
												<div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
												<div class="elsio_tx">10 July 2021</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Single Item -->
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="gup_blg_grid_box">
						<div class="gup_blg_grid_thumb">
							<a href=""><img src="assets/img/b-5.jpg" class="img-fluid" alt=""></a>
						</div>
						<div class="gup_blg_grid_caption">
							<div class="blg_tag"><span>Business</span></div>
							<div class="blg_title">
								<h4><a href="">What Is Ransomware: The Ultimate Guide?</a></h4>
							</div>
							<div class="blg_desc">
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
							</div>
						</div>
						<div class="crs_grid_foot">
							<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
								<div class="crs_fl_first">
									<div class="crs_tutor">
										<div class="crs_tutor_thumb"><a href="javascript:void(0);"><img src="assets/img/team-3.jpg" class="img-fluid circle" width="35" alt=""></a></div>
									</div>
								</div>
								<div class="crs_fl_last">
									<div class="foot_list_info">
										<ul>
											<li>
												<div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
												<div class="elsio_tx">10k Views</div>
											</li>
											<li>
												<div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
												<div class="elsio_tx">10 July 2021</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Single Item -->
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="gup_blg_grid_box">
						<div class="gup_blg_grid_thumb">
							<a href=""><img src="assets/img/b-6.jpg" class="img-fluid" alt=""></a>
						</div>
						<div class="gup_blg_grid_caption">
							<div class="blg_tag"><span>Accounting</span></div>
							<div class="blg_title">
								<h4><a href="">Can iPads Get Viruses? What You Need</a></h4>
							</div>
							<div class="blg_desc">
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
							</div>
						</div>
						<div class="crs_grid_foot">
							<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
								<div class="crs_fl_first">
									<div class="crs_tutor">
										<div class="crs_tutor_thumb"><a href="javascript:void(0);"><img src="assets/img/team-5.jpg" class="img-fluid circle" width="35" alt=""></a></div>
									</div>
								</div>
								<div class="crs_fl_last">
									<div class="foot_list_info">
										<ul>
											<li>
												<div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
												<div class="elsio_tx">10k Views</div>
											</li>
											<li>
												<div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
												<div class="elsio_tx">10 July 2021</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>

    <?php include 'includes/footer.php' ?>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php include 'includes/footer-link.php' ?>