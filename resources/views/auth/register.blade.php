@extends('templates.auth_master')
@section('content')
<body class="login-page">
<div class="page-header clear-filter" filter-color='orange'>
	<div class="page-header-image" style="background-image: url(/assets/img/login.jpg);"></div>
	<div class="content">
		<div class="container">
			<div class="col-md-6 ml-auto mr-auto">
				<div class="card card-login card-plain">
					<img src="/assets/img/now-logo.png" style="width: 250px">
					<form action="" method="POST" id="form">
						@csrf
							
						<div class="card-body">
							<div class="input-group no-border input-lg">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">face</i>
									</span>
								</div>
								<input type="text" class="form-control" placeholder="Nama Lengkap" required name="nama_lengkap">
							</div>
							
							<div class="input-group no-border input-lg">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">person</i>
									</span>
								</div>
								<input  type="text" class="form-control" placeholder="Username" required name="username">
							</div>
							<div class="input-group no-border input-lg">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">mail</i>
									</span>
								</div>
								<input required type="email" class="form-control" placeholder="Email" name="email">
							</div>
							<div class="input-group no-border input-lg">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">lock</i>
									</span>
								</div>
								<input type="password" class="form-control" placeholder="Password" required name="password">
							</div>
							
							<button class="btn btn-primary btn-round btn-lg btn-block" type="submit">Register</button>
							<div class="pull-left">
								<a href="login" class="text-white">Sudah punya akun?</a>
							</div>
						</div>

					</form>
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
				</div>
			</div>			
		</div>
	</div>
	<footer class="footer">
	<div class="container">
		<div class="pull-right">
			<p>Created by <a href="https://github.com/hythes" target="_blank">Hanif</a></p>
		</div>
		<div class="pull-left">
			<p>Using <a href="https://getbootstrap.com" target="_blank">Bootstrap 4</a> and <a href="https://demos.creative-tim.com/now-ui-kit/index.html" target="_blank">Now UI Kit</a></p>
		</div>
	</div>
	</footer>
</div>
@endsection