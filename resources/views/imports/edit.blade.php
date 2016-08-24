@extends('app')

@section('content')
	<div class="panel panel-success">
		<h1 class="panel-heading">Edit Data Import ({{date('F d, Y', strtotime($import->date))}})  </h1>
		<div class="panel-form panel-content">

			<h3>Item: {{$getItem->desc}}</h3>
			<h3>Negara: {{$getCountry->ctrydescen}}</h3>
			<h3>Pelabuhan: {{$getHarbor->podname}}</h3>
			<br>
			
			@include('errors.list')

			{!! Form::model($import, ['method' => 'patch', 'action' => ['ImportsController@update', $import->id]]) !!}
					@include('imports.form', ['submitButton'=>'Simpan Perubahan'])
				{!! Form::close() !!}
		</div>
	</div>
@stop