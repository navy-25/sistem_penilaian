<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Aplikasi Pengukur Kemajuan Hasil Belajar Siswa</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="icon" href="{{asset('assets/dist/logo.png')}}" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box " style="height:100%;width:100%">
					<div class="left" style="padding-left:50px;padding-right:50px">
						<div class="content">
							@guest
								@if (Route::has('login'))
									<div class="header">
										<h1 style="font-family:roboto;color:black">Login</h1>
										<h1 style="margin-top:-10px;font-family:roboto;color:black;color:#E78F27"><b>SIMAPAT </b> </h1>
										<img src="{{asset('assets/img/Rectangle2.svg')}}" style="margin:20px"> 
									</div>
									<form class="form-auth-small" method="POST" action="{{ route('login') }}">
										@csrf
										<div class="form-group">
											<input id="email" style="border-radius:100px;" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group">
											<input id="password" style="border-radius:100px;" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="row">
											<div class="col-md-6">
												<button type="submit" style="border-radius:100px;width:100%;background-color:#E78F27;color:white" class="btn">
													Login
												</button>
											</div>
											<div class="col-md-6">
												<a href="{{ route('register') }}" style="border-radius:100px;width:100%;background-color:#8F8F8F;color:white" class="btn">
													Daftar
												</a>
											</div>
										</div>
									</form>
								@endif
							@else
								<div class="header">
									<h1 style="font-family:roboto;color:black">Kamu Sudah Login </h1>
									<!-- <h1 style="margin-top:-10px;font-family:roboto;color:black;color:#E78F27"><b>Sebagai Mahasiswa</b> </h1> -->
									<img src="{{asset('assets/img/Rectangle2.svg')}}" style="margin:20px"> 
								</div>
								<a href="/home" style="border-radius:100px;width:100%;background-color:#E78F27;color:white" class="btn">
									Kembali ke Beranda
								</a>
								<br>
								<p>
									<center>
										or
									</center>
								</p>
								<a style="border-radius:100px;width:100%;background-color:#2B333E;color:white" class="btn" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									Keluar
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
								
							@endguest
                            <p style="margin-top:20%;font-size:10px;font-family:roboto;">Aplikasi Pengukur Kemajuan <br> Hasil Belajar Siswa</p>
						</div>
					</div>
					<div class="right">
						<div class="overlay" style=";background:#2B333E;opacity: 0.8;"></div>
						<div class="content text">
							<h1 class="heading" style="font-size:50px;font-family:roboto;"><b>Aplikasi Pengukur Kemajuan Hasil Belajar Siswa</b></h1>
                            <img src="{{asset('assets/img/Rectangle-orange.svg')}}" >
							<!-- <p style="margin-top:5%;font-family:roboto;">"Unggul dalam pendidikan kukuh dalam keilmuan"</p> -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
