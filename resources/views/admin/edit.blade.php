@extends('admin.layout')

@section('content')

{!! Form::model($news, ['route' => ['admin_update', $news->slug], 'method' => 'PATCH', 'files' => true]) !!}
	
	@include('admin.form')

{!! Form::close() !!}


@stop