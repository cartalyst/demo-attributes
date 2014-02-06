@extends('layouts.default')
@section('content')

	{{-- Page header --}}
	<div class="page-header">

		<h1>{{$patient->name}}</h1>

	</div>

	<p>
		<strong>Age: </strong> {{$patient->age}}
	</p>

	@foreach($patient->values as $value)
		<p>
			<strong>{{$value->attribute->name}}: </strong>
			@if (is_array(json_decode($value->value)))
				{{ implode(', ', json_decode($value->value, true)) }}
			@else
				{{ $patient->{$value->attribute->slug} }}
			@endif
		</p>
	@endforeach

@stop
