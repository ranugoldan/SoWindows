@extends('layout')

@section('title')
{{ $news->judul }}
@stop
@section('content')
<div id="content-show">
	<div id="show-area">
		<div id="story-head" class="row">
		<h3>
		<a href="{{ URL::to('/category/'.$news->kategori->nama_kategori.'') }}">
		{{ $news->kategori->nama_kategori }}
		</a>
		</h3>
		<h1 class="story-title">
			{{ $news->judul }}
		</h1>
		<div id="story-info">
			By
			<span> {{ $news->user->name }} </span>
			|
			<time class="story-date" > {{ date('F d, Y', strtotime($news->created_at)) }} </time>
		</div>
		</div>
		<div id="story-area" class="row">
			<div id="story-img">
				<img class="story-img" src="{{ asset('images/newstitle/newstitle'.$news->id.'.jpg') }}">
			</div>
			<div id="story-content">
				{!! ($news->isi) !!}
			</div>
		</div>
	</div>
	<div id="other-posts">
		<h4 class="post-header">
			<span class="post-header">BACA JUGA</span>
		</h4>
		<ul class="row">
			@if(empty($otherposts))

			@else
			@foreach($otherposts as $otherpost)
				<li class="col-md-4">
				<div id="other-img">
					<a href="">
						<img src="{{ asset('images/newstitle/newstitle'.$otherpost->id.'.jpg') }}">
					</a>
				</div>
				<div id="other-title">
					<a class="other-title" href="">{{$otherpost->judul}}</a>
				</div>

				</li>
			@endforeach
			@endif
		</ul>
	</div>
	<div id="comments-box">
		<h4 class="post-header">
			<span class="post-header">KOMENTAR</span>
		</h4>
		<div id="comments">
		<ul id="comment-list">
			@if($comments->isEmpty())
				<p>Tidak ada komentar</p>
			@else
			@foreach($comments as $comment)
				<li>
				<article itemprop="comment">
					<header class="comment-header">
						<p class="comment-author">
							<span> {{ $comment->nama }} </span>
							<span> says</span>
						</p>
						<p class="comment-meta">
							{{ date('F d, Y - H:i', strtotime($comment->created_at)) }}
						</p>
					</header>
					<div class="comment-content">
						<p>
							{{ $comment->komentar }}
						</p>
					</div>
				</article>

				</li>
			@endforeach
			@endif
		</ul>
		</div>
	</div>
	<div id="comment-form">
		<h4 class="post-header">
			<span class="post-header">BERI KOMENTAR</span>
		</h4>

		@if($errors->hasBag())
		<script type="text/javascript"> window.alert("Alamat email tidak valid")</script>

		@endif

		{!! Form::open(array('action' => array('HomeController@storeComment'))) !!}
		<div class="form-group">
		{!! Form::label('nama', 'Nama') !!}</div>
		<div class="form-group {{ $errors->has('title')? 'has-error': '' }}">
		{!! Form::text('nama', null, ['class' => 'form-control', 'required']) !!}
		{!! $errors->first('nama','<span class="help-block">:message</span>') !!}
		</div>
		<div class="form-group">
		{!! Form::label('email', 'E-mail') !!}
		</div>
		<div class="form-group {{ $errors->has('email')? 'has-error': '' }}">
		{!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
		{!! $errors->first('email','<span class="help-block">:message</span>') !!}
		</div>
		<div class="form-group">
		{!! Form::label('komentar', 'Komentar') !!}
		</div>
		<div class="form-group {{ $errors->has('komentar')? 'has-error': '' }}">
		{!! Form::textarea('komentar', null, ['class' => 'form-control', 'required']) !!}
		{!! $errors->first('komentar','<span class="help-block">:message</span>') !!}
		</div>
		{!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
		{!! Form::hidden('news_id', $news->id ) !!}

		{!! Form::close() !!}
	</div>

</div>


@stop