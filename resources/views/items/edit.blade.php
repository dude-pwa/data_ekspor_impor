@extends('app')

@section('content')
	<div class="panel panel-success">
		<h1 class="panel-heading">Edit {{$item->desc}} ({{$item->hsxcode}}) </h1>
		<div class="panel-form panel-content">
			@include('errors.list')
			

			{!! Form::model($item, ['method' => 'patch', 'action' => ['ItemsController@update', $item->id]]) !!}
					@include('items.form', ['submitButton'=>'Simpan Perubahan'])
				{!! Form::close() !!}
		</div>
	</div>
@stop