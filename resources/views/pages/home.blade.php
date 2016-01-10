 @extends('master')

 @section('content')
<h1>{{$name}}</h1>
@foreach ($lessons as $lesson)
	<h2>{{$lesson}}</h2>
@endforeach

 @stop