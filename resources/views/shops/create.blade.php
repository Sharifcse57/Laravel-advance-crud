@extends('layouts.app')
@section('css')
 		<link href="{{ asset('/css/parsley.css') }}" rel="stylesheet">
@endsection
@section('content')	
<div class="row">
	<div class="col-md-6">
		{{Form::model(request()->old(), ['route' => 'shops.store','data-parsley-validate' => ''])}}

			<div class="form-group">
				{{ Form::label('title', null,array('class'=>'control-label'))}}
				{{ Form::text('title', null,array('class'=>'form-control','minlength'=>"5", 'required' => '', 'maxlength' => '250'))}}
			</div>
			{{Form::submit('Submit',array('class'=>'btn btn-success'))}}

		{{Form::close()}}



	</div>
</div>
@stop

@section('script')
 		<script src="{{ asset('/js/parsley.min.js') }}"></script>
@endsection