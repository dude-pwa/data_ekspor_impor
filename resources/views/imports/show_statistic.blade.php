@extends('app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">
			<?php
				$negara = \App\Country::findOrFail($country);
			?>
			<h1>Daftar Import Negara {{strtoupper($negara->ctrydescen)}}</h1>
			<div class="row">
				<a class="btn btn-primary pull-right" href="/imports/statistic">Kembali</a>
			</div>
		</div>

		<table class="table table-striped">
			<tr>
				<th class="col-md-1">No.</th>
				<th class="col-md-1">Year</th>
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
			<?php $i = 0; ?>
				@foreach($imports as $import)
					<?php
						$item = $import->item()->first();
						$country = $import->country()->first();
						$harbor = $import->harbor()->first();
					?>
					<tr class="small">
						<td>{{($imports->currentpage()-1)*$imports->perpage()+1 + $i}}</td>
						<td>{{ strtoupper(date('Y', strtotime($import->date))) }}</td>
						<td>{{ strtoupper($item->hsxcode) }}</td>
						<td>{{ strtoupper($item->desc) }}</td>
						<td>{{ strtoupper($item->sitc8code) }}</td>
						<td>{{ strtoupper($country->destctry) }}</td>
						<td>{{ strtoupper($country->ctrydescen) }}</td>
						<td>{{ strtoupper($harbor->pod) }}</td>
						<td>{{ strtoupper($harbor->podname) }}</td>
						<td>{{ number_format($import->netwt) }}</td>
						<td>{{ number_format($import->value) }}</td>
						<td class="col-md-1" align="right">
							<a href="/imports/{{$import->id}}/edit" class="btn btn-xs btn-info">Edit</a> 
						</td>
						<td class="col-md-1 delete" align="left">
							{!! Form::open(['method'=>'delete', 'route'=>['imports.destroy', $import->id]]) !!}
							{!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger']) !!}
							{!!Form::close()!!}
						</td>
					</tr>
				<?php $i += 1 ?>
				@endforeach
		</table>

		<br>
		<div class="center">
			{{$imports->links()}}
		</div>
	</div>
		</table>
	</div>
@endsection