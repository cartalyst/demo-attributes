@extends('layouts.default')
@section('content')

	{{-- Page header --}}
	<div class="page-header">

		<span class="pull-right">

			<a class="btn btn-warning" href="{{ URL::to('patients/create') }}"><i class="fa fa-plus"></i> Add Patient</a>

		</span>

		<h1>Patients</h1>

	</div>

	<br />

	<table class="table table-striped table-bordered table-hover">

		<thead>
			<tr>
				<th data-sort="name"class="col-md-3">Patient Name</th>
				<th data-sort="slug"class="col-md-2">Patient Age</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($patients as $patient)
				<tr>
					<td>{{$patient->name}}</td>
					<td>{{$patient->age}}</td>
					<td>
						<a class="btn btn-primary tip" href="{{ URL::to('patients/' . $patient->id . '/edit') }}" title="Edit"><i class="fa fa-edit"></i></a>

						<a class="btn btn-info tip" href="{{ URL::to('patients/' . $patient->id) }}" title="View"><i class="fa fa-eye"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop
