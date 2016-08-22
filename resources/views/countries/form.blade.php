<div class="input-group">
	{!! Form::label('destctry', 'Kode Negara: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('destctry', null, ['class' => 'form-control']) !!}
</div> <br>
<div class="input-group">
	{!! Form::label('ctrydescen', 'Nama Negara: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('ctrydescen', null, ['class' => 'form-control']) !!}
</div><br>
<div class="input-group pull-right">
	<a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-default">Back</a> &nbsp;&nbsp;&nbsp;
	{!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>