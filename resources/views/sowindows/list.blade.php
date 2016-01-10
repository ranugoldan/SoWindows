@extends('layout')
@section('title')
 @yield('title')
@stop
@if($headers!=null)
@section('header')
	<div id="header" class="container">
      <div id="carousel-header" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#carousel-header" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-header" data-slide-to="1"></li>
        <li data-target="#carousel-header" data-slide-to="2"></li>
        </ol>

  <!-- Wrapper for slides -->
        <div id="carousel-wrapper" class="carousel-inner" role="listbox">
        @foreach($headers as $header)
          <div id="carousel-img" class="item <?php if($header->kategori_id==1) echo 'active' ?>">
          <a href="{{ URL::to('/') }}/{{ $header->slug }}">
           <img src="{{ asset('images/newstitle/newstitle'.$header->id.'.jpg') }}" alt="...">
            <div class="carousel-caption">
            <h3>{{ $header->kategori->nama_kategori }}</h3>
            <h2>{{ $header->judul }}</h2>
            </div>
          </a>
          </div>
        @endforeach

  <!-- Controls -->
        <a class="left carousel-control" href="#carousel-header" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-header" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
       </a>
      </div>
    </div>
@stop
@endif

@section('content')
<h3 class="content-title"> @yield('cat') </h3>
<div class="content-widget">
	<ul class="content-list">
		@yield('list')
	</ul>
</div>
@stop