@extends('app')

@section('content')
	<div class="panel panel-success">
		<h1 class="panel-heading">Edit {{$export->id}} ({{$export->date}}) </h1>
		<div class="panel-form panel-content">

			<h3>Item: {{$getItem->desc}}</h3>
			<h3>Negara: {{$getCountry->ctrydescen}}</h3>
			<h3>Pelabuhan: {{$getHarbor->podname}}</h3>
			<br>

			@include('errors.list')

			{!! Form::model($export, ['method' => 'patch', 'action' => ['ExportsController@update', $export->id]]) !!}
					@include('exports.form', ['submitButton'=>'Simpan Perubahan'])
				{!! Form::close() !!}
		</div>
	</div>
@stop