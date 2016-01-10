<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"></meta>
  <meta content="IE=edge" http-equiv="X-UA-Compatible"></meta>
  <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
	<title>Admin @sowindows - @yield('title')</title>
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
          <ul class="nav navbar-nav navbar-right ">
          	<li><a href="{{ URL::to('auth/logout') }}">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div id="content-wrapper" class="container">
@yield('content')
</div>
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>

<script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
</body>
</html>