@extends('admin.layout')
@section('content')
<div id="admin-header" class="row">
<div class="col-md-6">
<h1>
	{{ strtoupper($stories->first()->kategori->nama_kategori) }} POSTS
</h1>
</div>
<div id="admin-header-right" class="col-md-6">
	<a href="{{ URL::to('admin/posts/create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add new post</a>
</div>
</div>
<div id="table">
<table class="table table-hover">
	
<th><a href="#">ID</a></th>
<th><a href="#">Judul</a></th>
<th><a href="#">Tanggal dibuat</a></th>
<th><a href="#">Tanggal diupdate</a></th>
<th><a href="#">Penulis</a></th>
<th>Action</th>
@if($stories->isEmpty())
	<p>Belum ada post</p>
@else
@foreach($stories as $story)
<tr>
	<td>{{$story->id}}</td>
	<td>{{$story->judul}}</td>
	<td>{{$story->created_at}}</td>
	<td>{{$story->updated_at}}</td>
	<td>{{$story->user->name}}</td>
	<td>
	<a href="{{ URL::to('admin/posts/'.$story->slug.'/edit') }}"><span class="glyphicon glyphicon-pencil"></span></a>
	<a href="{{ URL::to('admin/posts/'.$story->slug.'/delete') }}"><span class="glyphicon glyphicon-trash"></span></a>
	</td>
</tr>
@endforeach
@endif
</table>
</div>
@stop