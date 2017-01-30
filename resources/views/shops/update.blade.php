@extends('layouts.app')

@section('content')	
<div class="row">
	<div class="col-md-6"> 
		
		{{Form::model($post, ['route' => ['shops.update',$post->id], 'method' => 'PUT' ])}}	
			<div class="form-group">
				{{ Form::label('title', null,array('class'=>'control-label'))}}
				{{ Form::text('title', null,array('class'=>'form-control'))}}
			</div>
			<input type="hidden" value="">
			{{Form::submit('Submit',array('class'=>'btn btn-success'))}}

		{{Form::close()}}

	</div>
</div>
@stop