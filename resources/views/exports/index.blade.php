@extends('app')

@section('content')
	<div class="panel panel-success">
		<h1 class="panel-heading">Daftar Pelabuhan</h1>
		<table class="table table-striped">
			<tr>
				<th class="col-md-1">No.</th>
				<th class="col-md-1">Date</th>
				<th class="col-md-2">Kode HS</th>
				<th class="col-md-2">Deskripsi Kode HS</th>
				<th class="col-md-2">Kode SITC8</th>
				<th class="col-md-2">Kode Negara</th>
				<th class="col-md-2">Country</th>
				<th class="col-md-3">Kode Pelabuhan</th>
				<th class="col-md-3">Pelabuhan</th>
				<th class="col-md-3">Berat Bersih</th>
				<th class="col-md-3">Value</th>
				<th colspan="2" class="center">Action</th>
			</tr>
			<?php $i = 1; ?>
			@while($i <= $exports->count())
				@foreach($exports as $export)
					<?php
						$item = $export->item()->first();
						$country = $export->country()->first();
						$harbor = $export->harbor()->first();
					?>
					<tr>
						<td>{{$i}}</td>
						<td>{{ strtoupper($export->date) }}</td>
						<td>{{ strtoupper($item->hsxcode) }}</td>
						<td>{{ strtoupper($item->desc) }}</td>
						<td>{{ strtoupper($item->sitc8code) }}</td>
						<td>{{ strtoupper($country->destctry) }}</td>
						<td>{{ strtoupper($country->ctrydescen) }}</td>
						<td>{{ strtoupper($harbor->pod) }}</td>
						<td>{{ strtoupper($harbor->podname) }}</td>
						<td>{{ strtoupper($export->netwt) }}</td>
						<td>{{ strtoupper($export->value) }}</td>
						<td class="col-md-1" align="right">
							<a href="/exports/{{$export->id}}/edit" class="btn btn-xs btn-info">Edit</a> 
						</td>
						<td class="col-md-1" align="left">
							{!! Form::open(['method'=>'delete', 'route'=>['exports.destroy', $export->id]]) !!}
							{!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger']) !!}
							{!!Form::close()!!}
						</td>
					</tr>
				<?php $i += 1 ?>
				@endforeach
			@endwhile
		</table>

		<br>
		<div class="center">
			{{$exports->links()}}
		</div>
	</div>
	<br>
	<a href="/exports/create" class="btn btn-primary">Tambah Daftar Export</a>
	<br><br>
@endsection

