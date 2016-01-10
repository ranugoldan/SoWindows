@extends('sowindows/list')

@section('title')
{{ str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($title)))) }}
@stop

@section('cat')
@if ($title!=='home')
{{ strtoupper($title) }}
@else
THE LATEST
@endif
@stop

@section('list')
@if($stories->isEmpty())
	<p>Belum ada post</p>
@else
@foreach($stories as $news)
<?php $beritasingkat = substr($news->isi, 0, 200);
	
?>
<li class="content-post">
<a href="{{ URL::to('/') }}/{{ $news->slug }}">
<div class="row">
<div class="col-md-6">
	<div class="content-post-img">
	<img src="{{ asset('/images/newstitle/newstitle'. $news->id .'.jpg') }}">
	<span class="content-post-cat">
		<h3 class="content-post-cat-contain">{{ $news->kategori->nama_kategori }}</h3>
	</span>
	</div>
</div>
<div class="content-post-preview col-md-6">
	<span class="post-info">
		<span class="post-author">{{ $news->user->name }}</span>
		| {{ $news->created_at }}
	</span>
	<h2>{{ $news->judul }}</h2>
	{!! $beritasingkat !!}...
</div>
</div>
</a>
</a>
</li>
@endforeach
@endif
<div id="pagination">
{!! $stories->render() !!}
</div>
@stop
