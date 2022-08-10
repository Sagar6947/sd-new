<?php include 'includes/header-link.php';
include 'db_connect.php';

session_start();

if (isset($_SESSION["username"])) {
	header("Location: {$hostname}dashboard.php");
}

?>

<div id="main-wrapper">


	<!-- Start Navigation -->
	<?php include 'includes/header2.php' ?>
	<!-- End Navigation -->

	<section class="gray">
		<div class="container">
			<div class="row align-items-start justify-content-center">
				<div class="col-xl-5 col-lg-8 col-md-12">

					<div class="signup-screen-wrap">
						<div class="signup-screen-single">
							<div class="text-center mb-4">
								<h4 class="m-0 ft-medium">Login Your Account</h4>
							</div>

							<form class="submit-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
								<div class="form-group">
									<label class="mb-1">Number</label>
									<input type="tel" class="form-control rounded" name="number" maxlength="10">
								</div>

								<div class="form-group password">
									<label class="mb-1">Password</label>
									<input type="password" class="form-control rounded" name="password">
									<i class="fas fa-eye"></i>
								</div>

								<div class="form-group">
									<div class="d-flex align-items-center justify-content-between">
										<!-- <div class="flex-1">
													<input id="dd" class="checkbox-custom" name="dd" type="checkbox" checked>
													<label for="dd" class="checkbox-custom-label w-100">Remember Me</label>
												</div>	 -->
										<div class="eltio_k2">
											<!-- <a href="#" class="theme-cl">Lost Your Password?</a> -->
										</div>
									</div>
								</div>

								<div class="form-group">
									<input type="submit" name="login" class="btn btn-md full-width theme-bg text-light rounded ft-medium" value="Login" />
								</div>

								<div class="form-group text-center mt-4 mb-0">
									<p class="mb-0">You Don't have any account? <a href="signup.php" class="ft-medium text-success">Sign Up</a></p>
								</div>
							</form>

							<?php
							if (isset($_POST['login'])) {
								include "db_connect.php";
								if (empty($_POST['number']) || empty($_POST['password'])) {
									echo '<div class="alert alert-danger">All Fields must be entered.</div>';
									die();
								} else {
									$username = $_POST['number'];
									$password = $_POST['password'];

									$sql = "SELECT rgid, mobile, password, name FROM tbl_registration WHERE mobile = '{$username}' AND password = '{$password}'";

									$result = mysqli_query($conn, $sql) or die("Query Failed.");

									if (mysqli_num_rows($result) > 0) {

										while ($row = mysqli_fetch_assoc($result)) {
											$_SESSION["username"] = $row['mobile'];
											$_SESSION["name"] = $row['name'];
											$_SESSION["user_id"] = $row['rgid'];

											header("Location: {$hostname}dashboard.php");
										}
									} else {
										echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
									}
								}
							}
							?>


						</div>
					</div>

				</div>
			</div>
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


<script>
	const pswrdField = document.querySelector(".submit-form .form-group input[type='password']"),
		toggleIcon = document.querySelector(".submit-form .form-group i");

	toggleIcon.onclick = () => {
		if (pswrdField.type === "password") {
			pswrdField.type = "text";
			toggleIcon.classList.add("active");
		} else {
			pswrdField.type = "password";
			toggleIcon.classList.remove("active");
		}
	}
</script>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php include 'includes/footer-link.php' ?>