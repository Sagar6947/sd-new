<?php include 'includes/header-link.php';
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
							<?php
							if ($this->session->has_userdata('msg')) {
								echo $this->session->userdata('msg');
								$this->session->unset_userdata('msg');
							}
							?>
							<?php
							echo $this->session->userdata('loginError');
							$this->session->unset_userdata('loginError');
							?>
							<form class="submit-form" method="POST">
								<div class="form-group">
									<label class="mb-1">Number</label>
									<input type="number" class="form-control rounded" name="mobile" maxlength="11">
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
									<input type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium" value="Login" />
								</div>

								<div class="form-group text-center mt-4 mb-0">
									<p class="mb-0">You Don't have any account? <a href="<?= base_url('signup') ?>" class="ft-medium text-success">Sign Up</a></p>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<?php include 'includes/footer.php' ?>

</div>






<script>
	$('input').attr('autocomplete', 'off');

	$(function() {
		$("input[name='mobile']").on('input', function(e) {
			$(this).val($(this).val().replace(/[^0-9]/g, ''));
		});
	});


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