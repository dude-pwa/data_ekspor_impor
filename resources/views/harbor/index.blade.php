@extends('app')

@section('content')
	<div class="panel panel-success">
		<h1 class="panel-heading">Daftar Pelabuhan</h1>
		<table class="table table-striped">
			<tr>
				<th class="col-md-1">No.</th>
				<th class="col-md-2">Kode Pelabuhan</th>
				<th class="col-md-3">Nama Pelabuhan</th>
				<th colspan="2" class="center">Action</th>
			</tr>
			<?php $i = 1; ?>
			@while($i <= $harbors->count())
				@foreach($harbors as $harbor)
					<tr>
						<td>{{$i}}</td>
						<td>{{ strtoupper($harbor->pod) }}</td>
						<td>{{ strtoupper($harbor->podname) }}</td>
						<td class="col-md-1" align="right">
							<a href="/harbor/{{$harbor->id}}/edit" class="btn btn-xs btn-info">Edit</a> 
						</td>
						<td class="col-md-1 delete" align="left">
							{!! Form::open(['method'=>'delete', 'route'=>['harbor.destroy', $harbor->id]]) !!}
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
			{{$harbors->links()}}
		</div>
	</div>
	<br>
	<a href="/harbor/create" class="btn btn-primary">Tambah Daftar Pelabuhan</a>
	<br><br>
@endsection

