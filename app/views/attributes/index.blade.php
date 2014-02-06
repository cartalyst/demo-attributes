@extends('layouts.default')
@section('content')

	{{-- Page header --}}
	<div class="page-header">

		<span class="pull-right">

			<a class="btn btn-warning" href="{{ URL::to('attributes/create') }}"><i class="fa fa-plus"></i> Add Attribute</a>

		</span>

		<h1>Attributes</h1>

	</div>

	<br />

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th data-sort="name"class="col-md-3">Attribute Slug</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($attributes as $attribute)
				<tr>
					<td>{{$attribute->slug}}</td>
					<td>
						<a class="btn btn-danger tip" data-toggle="modal" data-target="modal-confirm" href="{{ URL::to('attributes/' . $attribute->id . '/delete') }}" title="Delete"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>



	<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="model-confirm-label" aria-hidden="true">

		<div class="modal-dialog">

			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Delete</h4>
				</div>

				<div class="modal-body">

					Are you sure want to delete this attribute?

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="#" class="btn btn-danger confirm">Delete</a>
				</div>

			</div>

		</div>

	</div>


@stop

@section('scripts')
	<script src="/assets/js/scripts.js"></script>
@stop
