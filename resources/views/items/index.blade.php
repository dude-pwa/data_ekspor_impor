@extends('app')

@section('content')
	<a href="/items/create" class="btn btn-primary">Tambah Daftar Item</a>
	<br><br>
	<a href="/" class="btn btn-warning">Kembali Ke Menu Utama</a>
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
			<?php $i = 0; ?>
				@foreach($items as $item)
					<tr>
						<td>{{($items->currentpage()-1)*$items->perpage()+1 + $i}}</td>
						<td>{{ strtoupper($item->hsxcode) }}</td>
						<td>{{ strtoupper($item->desc) }}</td>
						<td>{{ strtoupper($item->sitc8code) }}</td>
						<td class="col-md-1" align="right">
							<a href="/items/{{$item->id}}/edit" class="btn btn-xs btn-info">Edit</a> 
						</td>
						<td class="col-md-1 delete" align="left">
							{!! Form::open(['method'=>'delete', 'route'=>['items.destroy', $item->id]]) !!}
							{!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger']) !!}
							{!!Form::close()!!}
						</td>
					</tr>
				<?php $i += 1 ?>
				@endforeach
		</table>

		<br>
		<div class="center">
			{{$items->links()}}
		</div>
	</div>
	<br>

@endsection

