@extends('app')

@section('content')
	<div class="panel panel-success">
		<h1 class="panel-heading">Daftar Item</h1>
		<table class="table table-striped">
			<tr>
				<th class="col-md-1">No.</th>
				<th class="col-md-2">Kode HS 10 Digit</th>
				<th class="col-md-3">Deskripsi Item</th>
				<th class="col-md-3">Kode SITC 8 Digit</th>
				<th colspan="2" class="center">Action</th>
			</tr>
			<?php $i = 1; ?>
			@while($i <= $items->count())
				@foreach($items as $item)
					<tr>
						<td>{{$i}}</td>
						<td>{{ strtoupper($item->hsxcode) }}</td>
						<td>{{ strtoupper($item->desc) }}</td>
						<td>{{ strtoupper($item->sitc8digit) }}</td>
						<td class="col-md-1" align="right">
							<a href="/items/{{$item->id}}/edit" class="btn btn-xs btn-info">Edit</a> 
						</td>
						<td class="col-md-1" align="left">
							{!! Form::open(['method'=>'delete', 'route'=>['items.destroy', $item->id]]) !!}
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
			{{$items->links()}}
		</div>
	</div>
	<br>
	<a href="/items/create" class="btn btn-primary">Tambah Daftar Item</a>
	<br><br>
@endsection

