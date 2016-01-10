<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"></meta>
  <meta content="IE=edge" http-equiv="X-UA-Compatible"></meta>
  <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
	<title>@yield('title') - Sowindows</title>
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
          <a id="navbrand" class="navbar-brand" href="{{ URL::to('/') }}"><img alt="Sowindows logo" src="{{ asset('/images/banner.png')}}"></img></a>
        </div>
        <div id="navbar-menu" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('home') }}">Home</a></li>
            <li><a href="{{ action('HomeController@category', 'news') }}">News</a></li>
            <li><a href="{{ action('HomeController@category', 'review') }}">Review</a></li>
            <li><a href="{{ action('HomeController@category', 'editorial') }}">Editorial</a></li>
          </ul>
            <div class="form-group">
          <form action="{{ route('search') }}" method="GET" class="navbar-form navbar-right" role="search">
              <input name="key" type="text" class="form-control" placeholder="Search">
            <button id="btn-search" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          </form>
            </div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    @yield('header')
    


    <div id="content-wrapper" class="container">
    <div id="content" class="container">
      <div class="row">
        <div id="content-main" class="col-md-9">

          @yield('content')
        </div>
        <div id="content-side" class="col-md-3">
          <div id="trending-widget">
            <span id="trending-header">
              <h3>Trending Now</h3>
            </span>
            <ul class="trending-list">
            @foreach($sidebar as $trending)
              <li>
                <a href="{{ route('news_path', $trending->slug) }}">
                  <div class="trending-list-img">
                    <img src="{{ asset('images/newstitle/newstitle'.$trending->id.'.jpg') }}">
                  </div>
                  <div class="trending-list-content">
                    <h2>{{ $trending->judul }}</h2>
                  </div>
                </a>
              </li>
              @endforeach
            </ul>
        </div>
        </div>
      </div>
    </div>
    </div>
    <div id="footer" class="container">
      <div id="footer-nav" class="row">
        <ul>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Our Team</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
      <div class="row">
        <div id="footer-left" class="col-md-4">
          <div id="logo-footer">
            <img alt="Sowindows" src="{{ asset('/images/banner.png') }}"></img>
          </div>
          <p>Sowindows adalah portal komunitas pengguna Windows dan Windows Phone terbesar di Indonesia. Kami membahas berbagai hal seputar Microsoft, Windows, Windows Phone, PC, Gadget dan hal seputar teknologi lainnya. </p>
          <p>We're heaven for Windows and Windows Phone user!</p>
          <div id="footer-social">
            <ul>
              <li class="fb-item">
              <a class="fb-but" target="blank" alt="Facebook"
              href="http://www.facebook.com/ranugoldan"><img height="24" src="{{ asset('/icons/fb.png') }}"></a>
              </li>
              <li class="twitter-item">
              <a class="twitter-but" target="blank" alt="Twitter"
              href="http://www.twitter.com/ranugoldan"><img height="24" src="{{ asset('/icons/twitter.png') }}"></a>
              </li>
              <li class="instagram-item">
              <a class="instagram-but" target="blank" alt="Instagram"
              href="http://www.instagram.com/ranugoldan"><img height="24" src="{{ asset('/icons/instagram.png') }}"></a>
              </li>
              <li class="youtube-item">
              <a style="background-image: url({{ asset('/icons/youtube.png') }})"
              class="youtube-but" target="blank" alt="Youtube"
              href="http://www.youtube.com/ranugoldan"><img height="24" src="{{ asset('/icons/youtube.png') }}"></a>
              </li>
            </ul>
          </div>
            <div id="copyright">
              <p>Copyright © 2015. Sowindows (Ranu-Faizal-Faris-Dhanika)</p>
            </div>
          </div>

          <div id="footer-center" class="col-md-4">
          <h2 class="no-margin">I LOVE ALLAH</h2>
          <p>Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah
            Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah
            Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah
            Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah
          </p>
          </div>

          <div id="footer-right" class="col-md-4">
          <h2 class="no-margin">I LOVE ALLAH</h2>
          <p>Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah
            Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah
            Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah
            Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah Subhanallah
          </p>
          </div>
      </div>
    </div>


<script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
</body>
</html>