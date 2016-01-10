	

	<div class="form-group {{ $errors->has('judul')? 'has-error': '' }}">
	{!! Form::label('Judul') !!}
	{!! Form::text('judul', null, ['class' => 'form-control']) !!}
	{!! $errors->first('judul','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group">
	{!! Form::label('Isi') !!}
	{!! Form::textarea('isi', null, ['class' => 'form-control']) !!}
	</div>
	

	{!! Form::hidden('user_id', 1 ) !!}

	<div class="form-group {{ $errors->has('slug')? 'has-error': '' }}">
	{!! Form::label('Kategori') !!}
	<select id="kategori_id" name="kategori_id" class="form-control">
	@foreach($cat as $kat)
	<option value={{ $kat->id }}>{{ strtoupper($kat->nama_kategori) }}</option>
	@endforeach	
	</select>
	</div>


	<div class="form-group {{ $errors->has('judul')? 'has-error': '' }}">
	{!! Form::label('Gambar header') !!}
	{!! Form::file('image'); !!}
	{!! $errors->first('image','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group">
	{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
	</div>
