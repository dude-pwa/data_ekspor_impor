@extends('app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">
			<h1>Status Negara Importir Terbanyak</h1>
			<div class="row">
				<a class="btn btn-primary pull-right" href="/imports/">Kembali</a>
			</div>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>No.</th>
				<th>Nama Negara</th>
				<th>Telah Melakukan Ekspor Sebanyak</th>
				{{-- <th>Pelabuhan</th> --}}
			</tr>
		<?php $i = 1; ?>
		@while($i <= count($countriesGroup))
		@foreach($countriesGroup as $countryGroup)
			<?php
				$negara = \App\Country::find($countryGroup->country_id);
				$totalNegara = \App\Import::where(['country_id'=>$countryGroup->country_id])->get()->count();
			?>
			<tr>
				<td>{{$i}}</td>
				<td>{{strtoupper($negara->ctrydescen)}}</td>
				<td>
						<a href="/imports/{{$countryGroup->country_id}}" class="btn btn-default">{{$totalNegara}}x</a>
				</td>
				<!--{{-- <td>
					<table>
						@foreach($imports as $import)
							@if($import->country_id == $negara->id)
									<?php 
										$harbor = \App\Harbor::find($import->harbor_id);
									?>
									<tr>
											<td>{{$harbor->podname}}</td>
									</tr>
							@endif
						@endforeach
					</table>
				</td> --}} -->
			</tr>
			<?php $i += 1 ?>
		@endforeach
		@endwhile
		</table>
	</div>
@endsection