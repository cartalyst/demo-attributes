@php
$formUrl = $attribute->exists ? route('demo.attributes.update', [$attribute->id]) : route('demo.attributes.store');
@endphp

@extends('demo/layouts.default')

@section('scripts')
    <script src="{{ url('assets/demo/js/attributes.js') }}"></script>
@stop

@section('content')
    <div class="page-header">
        <h1>{{ $attribute->exists ? 'Edit Attribute' : 'Create Attribute' }}</h1>
    </div>

    <br />

    <div class="form-horizontal">
        <form action="{{ $formUrl }}" method="post">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Name" value="{{ old('name', $attribute->name) }}">

                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <input type="text" name="slug" class="form-control form-control-lg" placeholder="Slug" value="{{ old('slug', $attribute->slug) }}">

                    @if ($errors->has('slug'))
                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <select name="type" id="type" class="form-control form-control-lg">
                        <option data-allow-options="0" value="">Select Type</option>
                        <option data-allow-options="0" value="text" {{ old('type', $attribute->type) == 'text' ? 'selected' : null }}>Text</option>
                        <option data-allow-options="1" value="checkbox" {{ old('type', $attribute->type) == 'checkbox' ? 'selected' : null }}>Checkbox</option>
                        <option data-allow-options="1" value="select" {{ old('type', $attribute->type) == 'select' ? 'selected' : null }}>Select</option>
                        <option data-allow-options="0" value="textarea" {{ old('type', $attribute->type) == 'textarea' ? 'selected' : null }}>Textarea</option>
                    </select>
                    @if ($errors->has('type'))
                        <div class="text-danger">{{ $errors->first('type') }}</div>
                    @endif
                </div>
            </div>

            <div class="d-none" data-options>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="width:40%;">Key</th>
                            <th style="width:40%;">Value</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-option-clone class="d-none">
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

            <div class="d-none" data-no-options>
                <div class="jumbotron">
                    <h4 class="text-center">The selected attribute type, doesn't allow options.</h4>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
@stop
