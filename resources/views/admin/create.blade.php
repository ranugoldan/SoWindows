@extends('admin.layout')

@section('content')
{!! Form::open(['route' => 'admin_store', 'files' => true]) !!}
	
	@include('admin.form')

{!! Form::close() !!}

@stop