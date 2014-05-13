@extends('layouts.default')
@section('content')

{{-- Page header --}}

<div>
	<h1>Patients</h1>
	<p class="lead">In this example, you can view patients and their meta data. Want more? head over to attributes and create one, then come back and see the magic.</p>
	<p><a class="btn btn-lg btn-success" href="{{ URL::to('patients/create') }}" role="button">Add Patient</a></p>
</div>
<hr>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Patients
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
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
									<div class="pull-right">
										<a class="btn btn-primary tip" href="{{ URL::to('patients/' . $patient->id . '/edit') }}" title="Edit"><i class="fa fa-edit"></i></a>
										<a class="btn btn-primary tip" href="{{ URL::to('patients/' . $patient->id) }}" title="View"><i class="fa fa-eye"></i></a>
									</div>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>

	@stop
