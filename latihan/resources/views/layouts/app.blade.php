<!DOCTYPE html>
<html>
	<head>
		<title>Material Design for Bootstrap temporary development test case</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Mobile support -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Material Design fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<!-- Bootstrap Material Design -->
		<link href="{{ asset('bootstrap-material-design-master/dist/css/bootstrap-material-design.css') }}" rel="stylesheet">
		<link href="{{ asset('bootstrap-material-design-master/dist/css/ripples.min.css') }}" rel="stylesheet">
		<!-- Dropdown.js -->
		<link href="//cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css" rel="stylesheet">
		<!-- Page style -->
		<link href="{{ asset('bootstrap-material-design-master/index.css') }}" rel="stylesheet">
		<!-- jQuery -->
		<a href="//code.jquery.com/jquery-1.10.2.min.js"><!--code.jquery.com/jquery-1.10.2.min.js</a>-->
	</head>
	<body>
		<!--
		Test case
		-->
		<div class="navbar navbar-info">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="javascript:void(0)">CRUD Akademik Sederhana</a>
				</div>
				<div class="navbar-collapse collapse navbar-warning-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="javascript:void(0)">Home</a></li>
						<li><a href="/jurusan">Jurusan</a></li>
						<li><a href="/mahasiswa">Mahasiswa</a></li>
					</ul>
					<form class="navbar-form navbar-left">
						<div class="form-group">
							<input type="text" class="form-control col-md-8" placeholder="Search">
						</div>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="javascript:void(0)">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			@yield('content') <!--untuk menampung content-->
		</div>
		<!--
		Scripts
		-->
		<!-- Twitter Bootstrap -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- Material Design for Bootstrap -->
		<script src="{{ asset('bootstrap-material-design-master/dist/js/material.js') }}"></script>
		<script src="{{ asset('bootstrap-material-design-master/dist/js/ripples.min.js') }}"></script>
		<script>
		  $.material.init();
		</script>
		<!-- Sliders -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
		<!-- Dropdown.js -->
		<script src="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.js"></script>
		<script>
		$("#dropdown-menu select").dropdown();
		</script>

	</body>
</html>
