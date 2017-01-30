@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-8">
	<h1>{{$date}}</h1>
		<table class="table">
			<tr>
				<th>Sr</th>
				<th>Title</th>
				<th>Create</th>
				<th>Action</th>
			</tr>
		@php 
			$i=1; 
		@endphp
		@foreach ($shops as $element)
			<tr>
				<td>{{$i}}</td>
				<td>{{$element->title}}</td>
				<td>{{Carbon\Carbon::parse($element->created_at)->format('Y-m-d')}}</td>
				<td>
					{!! Html::linkRoute('shops.edit', 'Edit', array($element->id), array('class' => 'btn btn-primary'))!!}
				</td>
				<td>
					{!! Form::open(['route' => ['shops.destroy', $element->id],'method' => 'DELETE']) !!}
							{!! Form::submit('Delete',['class' => 'btn btn-danger','onclick'=>"return confirm('Are you sure?')"]) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@php $i++; @endphp
		@endforeach
		</table>
	</div>
</div>
	
@stop

