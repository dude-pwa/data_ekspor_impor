@extends('app')

@section('content')
	<div class="panel panel-success">
		<h1 class="panel-heading">Edit {{$harbor->podname}} ({{$harbor->pod}}) </h1>
		<div class="panel-form panel-content">
			@include('errors.list')
			

			{!! Form::model($harbor, ['method' => 'patch', 'action' => ['HarborsController@update', $harbor->id]]) !!}
					@include('harbor.form', ['submitButton'=>'Simpan Perubahan'])
				{!! Form::close() !!}
		</div>
	</div>
@stop