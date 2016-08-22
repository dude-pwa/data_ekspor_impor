<div class="input-group">
	{!! Form::label('date', 'Tanggal: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div> <br>
<div class="input-group">
	{!! Form::label('item_id', 'Pilih Item: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::select('item_id', $item, null, array('class' => 'form-control')) !!}
</div><br>
<div class="input-group">
	{!! Form::label('country_id', 'Pilih Negara: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::select('country_id', $country, null, array('class' => 'form-control')) !!}
</div><br>
<div class="input-group">
	{!! Form::label('harbor_id', 'Pilih Pelabuhan: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::select('harbor_id', $harbor, null, array('class' => 'form-control')) !!}
</div><br>
<div class="input-group">
	{!! Form::label('netwt', 'Berat Bersih: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('netwt', null, ['class' => 'form-control']) !!}
</div> <br>
<div class="input-group">
	{!! Form::label('value', 'Value: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('value', null, ['class' => 'form-control']) !!}
</div> <br>
<div class="input-group pull-right">
	<a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-default">Back</a> &nbsp;&nbsp;&nbsp;
	{!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>