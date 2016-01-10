<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"></meta>
  <meta content="IE=edge" http-equiv="X-UA-Compatible"></meta>
  <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
	<title>Admin @sowindows</title>
  <link rel="shortcut icon" href="{{ asset('/icons/favicon.ico') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/stylex.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/reset.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.theme.min.css') }}">
</head>
<body>
	<nav id="navbar-wrapper" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a id="navbrand" class="navbar-brand" href="{{ URL::to('/admin') }}"><img alt="Sowindows logo" src="{{ asset('/images/banner.png')}}"></img></a>
        </div>
        <div id="navbar-menu" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Manage Post <span class="caret"></span>
              </a>
              <ul id="dropdownmenu" class="dropdown-menu" role="menu">
                <li><a href="{{ URL::to('admin/posts?cat=1') }}">News</a></li>
                <li><a href="{{ URL::to('admin/posts?cat=2') }}">Review</a></li>
                <li><a href="{{ URL::to('admin/posts?cat=3') }}">Editorial</a></li>
              </ul> 
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
