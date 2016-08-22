<div class="input-group">
	{!! Form::label('hsxcode', 'Kode HS 10 Digit: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('hsxcode', null, ['class' => 'form-control']) !!}
</div> <br>
<div class="input-group">
	{!! Form::label('desc', 'Deskripsi Item: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('desc', null, ['class' => 'form-control']) !!}
</div><br>
<div class="input-group">
	{!! Form::label('sitc8code', 'Kode SITC 8 Digit: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('sitc8code', null, ['class' => 'form-control']) !!}
</div><br>
<div class="input-group pull-right">
	<a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-default">Back</a> &nbsp;&nbsp;&nbsp;
	{!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>