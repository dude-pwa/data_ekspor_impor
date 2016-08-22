@extends('app')

@section('content')
	<div class="panel panel-success">
		<h1 class="panel-heading">Daftar Negara</h1>
		<table class="table table-striped">
			<tr>
				<th class="col-md-1">No.</th>
				<th class="col-md-2">Kode Negara</th>
				<th class="col-md-3">Nama Negara</th>
				<th colspan="2" class="center">Action</th>
			</tr>
			<?php $i = 1; ?>
			@while($i <= $countries->count())
				@foreach($countries as $country)
					<tr>
						<td>{{$i}}</td>
						<td>{{ strtoupper($country->destctry) }}</td>
						<td>{{ strtoupper($country->ctrydescen) }}</td>
						<td class="col-md-1" align="right">
							<a href="/countries/{{$country->id}}/edit" class="btn btn-xs btn-info">Edit</a> 
						</td>
						<td class="col-md-1" align="left">
							{!! Form::open(['method'=>'delete', 'route'=>['countries.destroy', $country->id]]) !!}
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
			{{$countries->links()}}
		</div>
	</div>
	<br>
	<a href="/countries/create" class="btn btn-primary">Tambah Daftar Negara</a>
	<br><br>
@endsection

