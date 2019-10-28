@extends('demo/layouts.default')

@section('content')
    <div class="page-header">
        <h1>Patients</h1>

        <p class="lead">In this example, you can view patients and their meta data. Want more? head over to attributes and create one, then come back and see the magic.</p>

        <p><a class="btn btn-lg btn-success" href="{{ route('demo.patients.create') }}" role="button">Add Patient</a></p>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient Age</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>
                                    <div class="pull-right">
                                        <a class="btn btn-primary tip" href="{{ route('demo.patients.edit', [$patient->id]) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger tip" data-toggle="modal" data-target="modal-confirm" href="{{ route('demo.patients.delete', [$patient->id]) }}" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>

    <div class="modal" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="model-confirm-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="text-center">Are you sure want to delete this patient?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger confirm">Delete</a>
                </div>
            </div>
        </div>
    </div>
@stop
