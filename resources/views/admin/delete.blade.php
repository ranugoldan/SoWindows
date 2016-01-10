@extends('admin.layout')

@section('content')

{!! Form::model($news) !!}
	
		
	<h2>Are you sure want to delete this post?</h2>
	<div class="form-group {{ $errors->has('judul')? 'has-error': '' }}">
	{!! Form::label('Judul') !!}
	{!! Form::text('judul', null, ['class' => 'form-control','disabled' => 'disabled']) !!}
	{!! $errors->first('judul','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group">
	{!! Form::label('Isi') !!}
	{!! Form::textarea('isi', null, ['class' => 'form-control','disabled' => 'disabled']) !!}
	</div>
	

	{!! Form::hidden('user_id', 1 ) !!}

	<div class="form-group {{ $errors->has('slug')? 'has-error': '' }}">
	{!! Form::label('Kategori') !!}
	<select id="kategori_id" name="kategori_id" class="form-control" disabled>
	<option value="{{ $news->id }}">{{ strtoupper($news->kategori->nama_kategori) }}</option>
	</select>
	</div>



	<div class="form-group">
	<a href="{{ route('admin_destroy', $news->slug) }}" class="btn btn-danger">DELETE THIS POST</a>
	</div>


{!! Form::close() !!}


@stop