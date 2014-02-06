@extends('layouts.default')

@section('content')

	{{-- Page header --}}
	<div class="page-header">

		<h1>Create Patient</h1>

	</div>

	<br />

	<div class="form-horizontal">

		{{ Form::open(array('url' => '/patients')) }}

		<div class="form-group">
			<div class="col-xs-10">
				<input type="text" name="name" class="form-control input-lg" placeholder="Name">
			</div>
			<div class="col-xs-2">
				<input type="number" name="age" class="form-control input-lg" placeholder="Age">
			</div>
		</div>

		@foreach($attributes as $attribute)

			<div class="form-group">
				<div class="col-xs-12">

					@if ($attribute->type === 'textarea')
						<label for="{{$attribute->slug}}">{{$attribute->name}}</label>
						<textarea class="form-control input-lg" name="{{$attribute->slug}}" id="" cols="30" rows="10"></textarea>
					@endif

					@if ($attribute->type === 'text')
						<label for="{{$attribute->slug}}">{{$attribute->name}}</label>
						<input class="form-control input-lg" type="text" name="{{$attribute->slug}}">
					@endif

					@if ($attribute->type === 'checkbox')
						<p><strong>{{$attribute->name}}</strong></p>
						@foreach ($attribute->options as $key => $value)
							<div class="checkbox">
								<label class="checkbox-inline">
									<input type="checkbox" name="{{$attribute->slug}}[]" id="{{$attribute->slug}}[]" value="{{$value}}"> {{$value}}
								</label>
							</div>
						@endforeach
					@endif

					@if ($attribute->type === 'select')
						<label for="{{$attribute->slug}}">{{$attribute->name}}</label>
						<select class="form-control input-lg" name="{{$attribute->slug}}" id="">
							@foreach($attribute->options as $key => $value)
								<option value="{{$value}}">{{$value}}</option>
							@endforeach
						</select>
					@endif

				</div>
			</div>

		@endforeach

		<div class="form-group">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>

		{{Form::close()}}

	</div>

@stop

@section('scripts')
	<script src="/assets/js/attributes.js"></script>
@stop
