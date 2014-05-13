@extends('layouts.default')

@section('content')

{{-- Page header --}}
<div class="page-header">

	<h1>Edit Patient</h1>

</div>

<div class="form-horizontal">
	{{ Form::open(array('url' => '/patients/' . $patient->id, 'method' => 'PUT')) }}

	<div class="form-group">
		<div class="col-xs-10">
			<input type="text" name="name" class="form-control input-lg" placeholder="Name" value="{{Input::old('name', $patient->name)}}">
		</div>
		<div class="col-xs-2">
			<input type="number" name="age" class="form-control input-lg" placeholder="Age" value="{{Input::old('age', $patient->age)}}">
		</div>
	</div>

	@foreach($attributes as $attribute)

	<div class="form-group">
		<div class="col-xs-12">

			@if ($attribute->type === 'textarea')
			<label for="{{$attribute->slug}}">{{$attribute->name}}</label>
			<textarea class="form-control input-lg" name="{{$attribute->slug}}" id="" cols="30" rows="10">{{ $patient->{$attribute->slug} }}</textarea>
			@endif

			@if ($attribute->type === 'text')
			<label for="{{$attribute->slug}}">{{$attribute->name}}</label>
			<input class="form-control input-lg" type="text" name="{{$attribute->slug}}" value="{{ $patient->{$attribute->slug} }}">
			@endif

			@if ($attribute->type === 'checkbox')
			<p><strong>{{$attribute->name}}</strong></p>
			<input type="hidden" name="{{ $attribute->slug }}" value="0">
			@foreach ($attribute->options as $key => $value)
			<div class="checkbox">
				<label class="checkbox-inline">
					<input type="checkbox" name="{{$attribute->slug}}[]" id="{{$attribute->slug}}[]" value="{{$value}}" {{ is_array($patient->{$attribute->slug}) ? in_array($value, $patient->{$attribute->slug}) ? ' checked' : null : null }}> {{$value}}
				</label>
			</div>
			@endforeach
			@endif

			@if ($attribute->type === 'select')
			<label for="{{$attribute->slug}}">{{$attribute->name}}</label>
			<select class="form-control input-lg" name="{{$attribute->slug}}" id="">
				<option value="">Select {{ $attribute->name }}</option>
				@foreach($attribute->options as $key => $value)
				<option value="{{$value}}" {{ $value == $patient->{$attribute->slug} ? ' selected="selected"' : null }}>{{$value}}</option>
				@endforeach
			</select>
			@endif

		</div>
	</div>

	@endforeach

	<div class="form-group">
		<div class="col-xs-12">
			<a href="{{URL::to('patients')}}" class="btn btn-warning">Cancel</a>
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>

	{{Form::close()}}
</div>


@stop

@section('scripts')
<script src="/assets/js/attributes.js"></script>
@stop
