@extends('demo/layouts.default')

@section('content')
    <div class="page-header">
        <h1>Attributes</h1>

        <p class="lead">Create attributes and assign them to any object! In this example attributes are assigned to the patients model. :)</p>

        <p><a class="btn btn-lg btn-success" href="{{ route('demo.attributes.create') }}" role="button">Add Attribute</a></p>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Attribute Name</th>
                            <th>Attribute Slug</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributes as $attribute)
                            <tr>
                                <td>{{ $attribute->name }}</td>
                                <td>{{ $attribute->slug }}</td>
                                <td>
                                    <div class="pull-right">
                                        <a class="btn btn-primary tip" href="{{ route('demo.attributes.edit', [$attribute->id]) }}" title="Update"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger tip" data-toggle="modal" data-target="modal-confirm" href="{{ route('demo.attributes.delete', [$attribute->id]) }}" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                    <p class="text-center">Are you sure want to delete this attribute?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger confirm">Delete</a>
                </div>
            </div>
        </div>
    </div>
@stop
