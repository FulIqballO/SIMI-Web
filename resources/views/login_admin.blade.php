<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sign In | SIMI</title>

	<link href="{{ asset('admin_asset/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<style>
		
.animated-bg {
	background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fbc2eb, #a18cd1);
	background-size: 400% 400%;
	animation: gradientBG 15s ease infinite;
	min-height: 100vh;
}

@keyframes gradientBG {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

.card {
	background-color: rgba(255, 255, 255, 0.85); 
	box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2); /* Lembutkan bayangan */
	border-radius: 1rem;
}
</style>
	
</head>

<body class="animated-bg">
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-3">
							<h1 class="h2">SIMI</h1>
							<small class="fw-bold">Pekerja Migran</small>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{ route('ceklogin') }}" method="POST">
										@csrf

									@if(session('error'))
										<div class="row">
											<div class="col-md-8 mx-auto">
												{{-- <img src="{{ asset('logo_simi/logoSimi.png') }}" alt="Logo SIMI" style="max-height: 80px;"> --}}
												<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
													{{ session('error') }}
													<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
												</div>
											</div>
										</div>
									@endif

										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
										</div>
										<div>
											<div class="form-check align-items-center mb-3">
												<input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me">
												<label class="form-check-label text-small" for="customControlInline">Remember me</label>
											</div>
										</div>
										<div class="mb-3 col-md-12 float-end">
											<button type="submit" class="btn btn-outline-primary">Sign In</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="{{ asset('admin_asset/js/app.js') }}"></script>

</body>

</html>