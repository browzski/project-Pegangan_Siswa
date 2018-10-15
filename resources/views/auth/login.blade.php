@extends('templates.auth_master')
@section('content')
<body class="login-page">
<div class="page-header clear-filter" filter-color='orange'>
	<div class="page-header-image" style="background-image: url(/assets/img/login.jpg);"></div>
	<div class="content">
		<div class="container">
			<div class="col-md-4 ml-auto mr-auto">
				<div class="card card-login card-plain">
					<form action="" method="POST" id="form">
						@csrf
						<div class="card-header">
							<img src="/assets/img/now-logo.png" style="width: 250px"><br>
						</div>
						<div class="card-body">
							<div class="input-group no-border input-lg">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">person</i>
									</span>
								</div>
								<input type="text" class="form-control" placeholder="Username atau Email" name="username" required>
							</div>
							<div class="input-group no-border input-lg">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">lock</i>
									</span>
								</div>
								<input type="password" class="form-control" placeholder="Password"  name="password" required>
							</div>
							<button class="btn btn-primary btn-round btn-lg btn-block" type="submit">Login</button>
							<div class="pull-right">
								<a href="register" class="text-white">Belum punya akun?</a>
							</div>
						</div>
					</form>
					@if ($errors->any())
					<br>
					    <div class="alert">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li class="text-danger">{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					@if(isset($_GET['err']))
						<div class="alert">
						    <ul>
						        <li class="text-danger">Username atau password salah!</li>
						    </ul>
						</div>
					@endif
					@if(isset($_GET['sql']))
						<div class="alert">
						        <p class="text-danger"> Lu kira Web ane bisa kena SQL Injection? ngakak anjir awkoawkok, mau jadi hekel bang? :v</p>
						</div>
					@endif
				</div>
			</div>			
		</div>

	</div>

	<footer class="footer">
	<div class="container">
		<div class="pull-right">
			<p>Created by <a href="https://github.com/hythes" target="_blank">Hanif Setyananda</a></p>
		</div>
		<div class="pull-left">
			<p>Using <a href="https://getbootstrap.com" target="_blank">Bootstrap 4</a> and <a href="https://demos.creative-tim.com/now-ui-kit/index.html" target="_blank">Now UI Kit</a></p>
		</div>
	</div>
	</footer>
</div>
</div>
@endsection