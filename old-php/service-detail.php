<?php include 'includes/header-link.php';
include 'db_connect.php'; ?>

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader"></div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ======================= Searchbar Banner ======================== -->


    <?php
    $sid = $_GET['id'];
    $sql = "SELECT * FROM website_subservice WHERE id = {$sid}";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>



            <section class="featured-wraps black" style="padding-top: 120px !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="Goodup-ops-bhriol">
                                <div class="Goodup-lkp-flex d-flex align-items-start justify-content-start">
                                    <div class="Goodup-lkp-thumb">
                                        <img src="assets/img/burger-king.png" class="img-fluid" width="90" alt="" />
                                    </div>
                                    <div class="Goodup-lkp-caption ps-3">
                                        <div class="Goodup-lkp-title">
                                            <h1 class="mb-0 ft-bold text-white"><?php echo $row['name']; ?></h4>
                                        </div>
                                        <div class="Goodup-ft-first">
                                            <div class="Goodup-rating">
                                                <div class="Goodup-rates">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="Goodup-price-range">
                                                <span class="ft-medium">34 Reviews</span>
                                            </div>
                                        </div>
                                         <div class="Goodup-location text-white"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>Delhi, India</div>

                                        <!-- <div class="d-block mt-1">
											<div class="list-lioe">
												<div class="list-lioe-single"><span class="ft-medium text-danger">Closed</span><span class="ft-medium ms-2">11:00 AM - 12:00 AM</span></div>
											</div>
										</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ======================= Searchbar Banner ======================== -->

            <!-- ============================ Listing Details Start ================================== -->
            <section class="py-5 position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">

                            <div class="featured-slick mb-4">
                                <div class="featured-gallery-slide">
                                    <div class="dlf-flew auto"><a href="assets/img/listing/l-8.jpg" class="mfp-gallery"><img src="assets/img/listing/l-8.jpg" class="img-fluid mx-auto" alt="" /></a></div>
                                    <div class="dlf-flew auto"><a href="assets/img/listing/l-8.jpg" class="mfp-gallery"><img src="assets/img/listing/l-8.jpg" class="img-fluid mx-auto" alt="" /></a></div>
                                    <div class="dlf-flew auto"><a href="assets/img/listing/l-8.jpg" class="mfp-gallery"><img src="assets/img/listing/l-8.jpg" class="img-fluid mx-auto" alt="" /></a></div>
                                    <div class="dlf-flew auto"><a href="assets/img/listing/l-8.jpg" class="mfp-gallery"><img src="assets/img/listing/l-8.jpg" class="img-fluid mx-auto" alt="" /></a></div>
                                    <div class="dlf-flew auto"><a href="assets/img/listing/l-8.jpg" class="mfp-gallery"><img src="assets/img/listing/l-8.jpg" class="img-fluid mx-auto" alt="" /></a></div>
                                    <div class="dlf-flew auto"><a href="assets/img/listing/l-8.jpg" class="mfp-gallery"><img src="assets/img/listing/l-8.jpg" class="img-fluid mx-auto" alt="" /></a></div>
                                    <div class="dlf-flew auto"><a href="assets/img/listing/l-8.jpg" class="mfp-gallery"><img src="assets/img/listing/l-8.jpg" class="img-fluid mx-auto" alt="" /></a></div>
                                    <div class="dlf-flew auto"><a href="assets/img/listing/l-8.jpg" class="mfp-gallery"><img src="assets/img/listing/l-8.jpg" class="img-fluid mx-auto" alt="" /></a></div>

                                </div>
                            </div>

                            <!-- About The Business -->
                            <div class="d-block">
                                <div class="jbd-01">
                                    <div class="jbd-details">
                                        <h5 class="ft-bold fs-lg">About the Business</h5>

                                        <div class="d-block mt-3">
                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
                                            <p class="p-0 m-0">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    <?php
                }
            }
                    ?>

                    <!-- Business Menu -->

                    <div class="sep-devider"></div>



                    <!-- Drop Your Review -->
                    <div class="d-block">
                        <div class="jbd-01">
                            <div class="jbd-details">
                                <h5 class="ft-bold fs-lg">Drop Your Review</h5>
                                <div class="review-form-box form-submit mt-3">
                                    <form>
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Choose Rate</label>
                                                    <select class="form-control rounded">
                                                        <option>Choose Rating</option>
                                                        <option>1 Star</option>
                                                        <option>2 Star</option>
                                                        <option>3 Star</option>
                                                        <option>4 Star</option>
                                                        <option>5 Star</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Name</label>
                                                    <input class="form-control rounded" type="text" placeholder="Your Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Email</label>
                                                    <input class="form-control rounded" type="email" placeholder="Your Email">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Review</label>
                                                    <textarea class="form-control rounded ht-140" placeholder="Review"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn theme-bg text-light rounded">Submit Review</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>

                        <!-- Sidebar -->
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

                            <!-- Author Box -->
                            <div class="jb-apply-form bg-white rounded py-4 px-4 border mb-4">
                                <div class="Goodup-agent-blocks">
                                    <div class="Goodup-agent-thumb"><img src="assets/img/t-1.png" width="90" class="img-fluid circle" alt=""></div>
                                    <div class="Goodup-agent-caption">
                                        <h4 class="ft-medium mb-0">Sahar Direcotry</h4>
                                        <span class="agd-location"><i class="lni lni-map-marker me-1"></i>Delhi, India</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="Goodup-iuky">
                                    <ul>
                                        <li>140+<span>Listings</span></li>
                                        <li>
                                            <div class="text-success">4.7</div><span>Rattings</span>
                                        </li>
                                        <li>80K<span>Followers</span></li>
                                    </ul>
                                </div>

                                <div class="agent-cnt-info">
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <a href="javascript:void(0);" class="adv-btn full-width">Send Message</a>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <a href="javascript:void(0);" class="adv-btn full-width theme-bg text-light">View Profile</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Business Inof -->
                            <div class="jb-apply-form bg-white rounded py-4 px-4 border mb-4">
                                <div class="uli-list-info">
                                    <ul>

                                        <li>
                                            <div class="list-uiyt">
                                                <div class="list-iobk"><i class="fas fa-globe"></i></div>
                                                <div class="list-uiyt-capt">
                                                    <h5>Live Site</h5>
                                                    <p>https://sahardirectory.com/</p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="list-uiyt">
                                                <div class="list-iobk"><i class="fas fa-envelope"></i></div>
                                                <div class="list-uiyt-capt">
                                                    <h5>Drop a Mail</h5>
                                                    <p>hello@sahardirectory.com</p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="list-uiyt">
                                                <div class="list-iobk"><i class="fas fa-phone"></i></div>
                                                <div class="list-uiyt-capt">
                                                    <h5>Call Us</h5>
                                                    <p>7419272427</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="list-uiyt">
                                                <div class="list-iobk"><i class="fas fa-map-marker-alt"></i></div>
                                                <div class="list-uiyt-capt">
                                                    <h5>Get Directions</h5>
                                                    <p>
                                                        Delhi, India
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>


                            <div class="row g-3 mb-3">

                                <div class="col-6"><a href="javascript:void(0);" class="adv-btn full-width"><i class="fas fa-share"></i>Share</a></div>
                                <div class="col-6"><a href="javascript:void(0);" class="adv-btn full-width"><i class="fas fa-heart"></i>Save</a></div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
            <!-- ============================ Listing Details End ================================== -->

            <!-- ======================= Related Listings ======================== -->

            <!-- ======================= Newsletter Start ============================ -->
            <section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
                <div class="container py-5">

                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="sec_title position-relative text-center mb-5">
                                <h6 class="text-light mb-0">Subscribr Now</h6>
                                <h2 class="ft-bold text-light">Get All Updates & Advance Offers</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
                            <form class="bg-white rounded p-1">
                                <div class="row no-gutters">
                                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
                                        <div class="form-group mb-0 position-relative">
                                            <input type="text" class="form-control b-0" placeholder="Enter Your Email Address">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                                        <div class="form-group mb-0 position-relative">
                                            <button class="btn full-width btn-height theme-bg text-light fs-md" type="button">Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
            <!-- ======================= Newsletter Start ============================ -->

            <?php include 'includes/footer.php' ?>

</div>
<!-- ============================================================== -->
<?php include 'includes/footer-link.php' ?>