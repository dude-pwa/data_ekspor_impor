@extends('app')

@section('content')
	<div class="panel panel-success">
	<div class="panel-heading">
		<h1>Daftar Komoditi Export Berdasarkan per HS</h1>

		<div class="row">

		{{-- start fungsi sort --}}
			<p class="col-md-4">
				Urut Berdasarkan: 

				<select id="sort">
					<option disabled selected> -- select an option -- </option>
					<option value="{{route('sort_exports', ['sort'=>'date_desc'])}}">Tanggal (Terbaru)</option>
					<option value="{{route('sort_exports', ['sort'=>'date_asc'])}}">Tanggal (Terlama)</option>
					<option value="{{route('sort_exports', ['sort'=>'netwt_asc'])}}">Berat Bersih (Terkecil)</option>
					<option value="{{route('sort_exports', ['sort'=>'netwt_desc'])}}">Berat Bersih (Terbesar)</option>
					<option value="{{route('sort_exports', ['sort'=>'value_asc'])}}">Value (Terkecil)</option>
					<option value="{{route('sort_exports', ['sort'=>'value_desc'])}}">Value (Terbesar)</option>
				</select>
				
				<script type="text/javascript">
				 var urlmenu = document.getElementById( 'sort' );
				 urlmenu.onchange = function() {
				   window.open( this.options[ this.selectedIndex ].value, '_self');
				 };
				</script>
				
				<script>
					var getUrlParameter = function getUrlParameter(sParam) {
					    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
					        sURLVariables = sPageURL.split('&'),
					        sParameterName,
					        i;

					    for (i = 0; i < sURLVariables.length; i++) {
					        sParameterName = sURLVariables[i].split('=');

					        if (sParameterName[0] === sParam) {
					            return sParameterName[1] === undefined ? true : sParameterName[1];
					        }
					    }
					};

					var sort_select = getUrlParameter('sort');
					if(sort_select == 'date_asc'){
						$("#sort")[0].selectedIndex = 2;
					}else if(sort_select == 'date_desc'){
						$("#sort")[0].selectedIndex = 1;
					}else if(sort_select == 'netwt_asc'){
						$("#sort")[0].selectedIndex = 3;
					}else if(sort_select == 'netwt_desc'){
						$("#sort")[0].selectedIndex = 4;
					}else if(sort_select == 'value_asc'){
						$("#sort")[0].selectedIndex = 5;
					}else if(sort_select == 'value_desc'){
						$("#sort")[0].selectedIndex = 6;
					}
				</script>
			</p>

			{{-- end fungsi sort --}}
			<br>
			<a class="btn btn-default pull-right" href="/exports/statistic">Lihat Negara Pengekspor Terbanyak</a>
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
				@foreach($exports as $export)
					<?php
						$item = $export->item()->first();
						$country = $export->country()->first();
						$harbor = $export->harbor()->first();
					?>
					<tr class="small">
						<td>{{($exports->currentpage()-1)*$exports->perpage()+1 + $i}}</td>
						<td>{{ strtoupper(date('Y', strtotime($export->date))) }}</td>
						<td>{{ strtoupper($item->hsxcode) }}</td>
						<td>{{ strtoupper($item->desc) }}</td>
						<td>{{ strtoupper($item->sitc8code) }}</td>
						<td>{{ strtoupper($country->destctry) }}</td>
						<td>{{ strtoupper($country->ctrydescen) }}</td>
						<td>{{ strtoupper($harbor->pod) }}</td>
						<td>{{ strtoupper($harbor->podname) }}</td>
						<td>{{ number_format($export->netwt, 0) }}</td>
						<td>{{ number_format($export->value, 0) }}</td>
						<td class="col-md-1" align="right">
							<a href="/exports/{{$export->id}}/edit" class="btn btn-xs btn-info">Edit</a> 
						</td>
						<td class="col-md-1 delete" align="left">
							{!! Form::open(['method'=>'delete', 'route'=>['exports.destroy', $export->id]]) !!}
							{!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger']) !!}
							{!!Form::close()!!}
						</td>
					</tr>
				<?php $i += 1 ?>
				@endforeach
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

