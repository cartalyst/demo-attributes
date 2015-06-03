@extends('layouts.default')
@section('content')

	{{-- Page header --}}
	<div class="page-header">

		<h1>Create Attribute</h1>

	</div>

	<br />

	<div class="form-horizontal">
		{!! Form::open(array('url' => '/attributes')) !!}

		<div class="form-group">
			<div class="col-xs-6">
				<input type="text" name="name" class="form-control input-lg" placeholder="Name" required>
			</div>
			<div class="col-xs-6">
				<input type="text" name="slug" class="form-control input-lg" placeholder="Slug" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12">
				<select name="type" id="type" class="form-control input-lg" required>
					<option data-allow-options="0" value="">Select Type</option>
					<option data-allow-options="0" value="text">Text</option>
					<option data-allow-options="1" value="checkbox">Checkbox</option>
					<option data-allow-options="1" value="select">Select</option>
					<option data-allow-options="0" value="textarea">Textarea</option>
				</select>
			</div>
		</div>

		<div class="hide" data-options>

			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th style="width:40%;">Key</th>
						<th style="width:40%;">Value</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					<tr data-option-clone class="hide">
						<td><input class="form-control" name="options[0][key]" type="text"></td>
						<td><input class="form-control" name="options[0][value]" type="text"></td>
						<td><span data-option-remove class="btn btn-danger btn-sm">Remove</span></td>
					</tr>

					<tr data-options-empty>
						<td colspan="4">There are no options.</td>
					</tr>

				</tbody>
				<tfoot>
					<tr>
						<td colspan="2"></td>
						<td><span data-option-add class="btn btn-info btn-sm">Add Option</span></td>
					</tr>
				</tfoot>
			</table>

		</div>

		<div class="hide" data-no-options>

			<div class="jumbotron">
				<h4 class="text-center">The selected attribute type, doesn't allow options.</h4>
			</div>

		</div>

		<div class="form-group">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>

		{!! Form::close() !!}
	</div>

@stop

@section('scripts')
	<script src="{{ URL::to('assets/js/attributes.js') }}"></script>
@stop
