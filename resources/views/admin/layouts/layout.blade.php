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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>SIMI</title>
	<!-- Font Awesome CDN -->
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="{{ asset('admin_asset/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">SIMI</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header fw-bold">
						Master
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('admin') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin') }}">
            <i class="bi bi-grid-1x2-fill"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('info_training.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('info_training.index') }}">
             <i class="fa-solid fa-sitemap"></i> <span class="align-middle">Informasi Pelatihan</span>
            </a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('job.*') ? 'active bg-primary text-white' : ''}}" href="{{ route('job.index') }}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Posisi Pekerjaan</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('content.*') ? 'active bg-primary text-white' : ''}}" href="{{ route('content.index') }}">
              <i class="fa-solid fa-folder"></i> <span class="align-middle">Berita</span>
            </a>
				</li>

				<li class="sidebar-item">
					<a class="sidebar-link {{ request()->routeIs('trainingschedule.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('trainingschedule.index') }}">
		 <i class="fa-regular fa-calendar"></i> <span class="align-middle">Jadwal Pelatihan</span>
		</a>
				</li>


					</li>

					<li class="sidebar-header fw-bold">
						Data
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('payment.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('payment.index') }}">
              <i class="bi bi-bag-dash"></i> <span class="align-middle">Pembayaran</span>
            </a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('training_registration.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('training_registration.index') }}">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Registrasi Pelatihan</span>
            </a>
					</li>
					

					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('examscore.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('examscore.index') }}">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Input Nilai</span>
            </a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-forms.html">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Pembayaran Berhasil</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-cards.html">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Pembayaran Gagal</span>
            </a>
					</li>

					
					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('informasi_perjalanan.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('informasi_perjalanan.index') }}">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Informasi Perjalanan</span>
            </a>

					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Informasi Keberangkatan</span>
            </a>

			</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Informasi Kepulangan</span>
            </a>

					</li>
					

					

				


					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link {{ request()->routeIs('report_departure.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('report_departure.index') }}">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Laporan Keberangkatan</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="icons-feather.html">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Laporan Kepulangan</span>
            </a>
					</li>
				</ul>

				
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>

										
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>
			 @auth('admin')
<div class="dropdown">
  <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="{{ asset('image_public/JUNI.jpg') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
    <span class="text-dark">{{ Auth::guard('admin')->user()->admin_name ?? '' }}</span>
  </a>

  <div class="dropdown-menu dropdown-menu-end">
    <a href="" class="dropdown-item fw-bold">
      <i class="align-middle me-1" data-feather="user"></i>
      {{ Auth::guard('admin')->user()->admin_name ?? ''}}
    </a>
    <a class="dropdown-item" href="pages-profile.html">
      <i class="align-middle me-1" data-feather="user"></i> Profile
    </a>
    <a class="dropdown-item" href="#">
      <i class="align-middle me-1" data-feather="pie-chart"></i> Analytics
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="index.html">
      <i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy
    </a>
    <a class="dropdown-item" href="#">
      <i class="align-middle me-1" data-feather="help-circle"></i> Help Center
    </a>
    <div class="dropdown-divider"></div>

    <form action="{{ route('admin.logout') }}" method="POST" id="logout-form">
      @csrf
      <button type="submit" class="dropdown-item">
        <i class="align-middle me-1" data-feather="log-out"></i> Log out
      </button>
    </form>
  </div>
</div>
@endauth
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					@yield('admin_layout')
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="#" target="_blank"><strong>SIMI</strong></a> - <a class="text-muted" href="#" target="_blank"><strong>Teknik Informatika Golongan Internasional Kelompok 2</strong></a>
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>



	 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

	 <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
	<script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeo1ZB1j3W8wpr7xHdTOfvt1MppJgI4zECszO2zC/OrQ6a8+" 
        crossorigin="anonymous">
</script>

	<script src="{{ asset('admin_asset/js/app.js') }}"></script>

@yield('custom_js')
</body>

</html>