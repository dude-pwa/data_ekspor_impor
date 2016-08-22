<div class="input-group">
	{!! Form::label('pod', 'Kode Pelabuhan: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('pod', null, ['class' => 'form-control']) !!}
</div> <br>
<div class="input-group">
	{!! Form::label('podname', 'Nama Pelabuhan: ', ['class'=>'input-group-addon bold']) !!}
	{!! Form::text('podname', null, ['class' => 'form-control']) !!}
</div><br>
<div class="input-group pull-right">
	<a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-default">Back</a> &nbsp;&nbsp;&nbsp;
	{!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>