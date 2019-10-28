@php
$formUrl = $patient->exists ? route('demo.patients.update', [$patient->id]) : route('demo.patients.store');
@endphp

@extends('demo/layouts.default')

@section('content')
    <div class="page-header">
        <h1>{{ $patient->exists ? 'Edit Patient' : 'Create Patient' }}</h1>
    </div>

    <div class="form-horizontal">
        <form action="{{ $formUrl }}" method="post">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-10">
                    <input type="text" name="name" class="form-control input-lg" placeholder="Name" value="{{ old('name', $patient->name) }}">

                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-2">
                    <input type="number" name="age" class="form-control input-lg" placeholder="Age" value="{{ old('age', $patient->age) }}">

                    @if ($errors->has('age'))
                        <div class="text-danger">{{ $errors->first('age') }}</div>
                    @endif
                </div>
            </div>

            @foreach($attributes as $attribute)
                <div class="form-row">
                    <div class="form-group col-md-12">
                        @if ($attribute->type === 'textarea')
                            <label for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>

                            <textarea class="form-control form-control-lg" name="attributes[{{ $attribute->slug }}]" id="" cols="30" rows="10">{{ $patient->{$attribute->slug} }}</textarea>
                        @endif

                        @if ($attribute->type === 'text')
                            <label for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>

                            <input class="form-control input-lg" type="text" name="attributes[{{ $attribute->slug }}]" value="{{ $patient->{$attribute->slug} }}">
                        @endif

                        @if ($attribute->type === 'checkbox')
                            <p>{{ $attribute->name }}</p>

                            <input type="hidden" name="attributes[{{ $attribute->slug }}]" value="0">

                            @foreach ($attribute->options as $key => $value)
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="attributes[{{ $attribute->slug }}][]" id="{{ $attribute->slug }}[]" value="{{ $value }}"{{ is_array($patient->{$attribute->slug}) ? in_array($value, $patient->{$attribute->slug}) ? ' checked' : null : null }}> {{ $value }}
                            </label>
                            @endforeach
                        @endif

                        @if ($attribute->type === 'select')
                            <label for="attributes[{{ $attribute->slug }}]">{{ $attribute->name }}</label>

                            <select class="form-control input-lg" name="attributes[{{ $attribute->slug }}]" id="">
                                @foreach ($attribute->options as $key => $value)
                                    <option value="{{ $value }}"{{ $value == $patient->{$attribute->slug} ? ' selected="selected"' : null }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="form-row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success">Save</button>

                    <a href="{{ route('demo.patients.index') }}" class="btn btn-warning">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@stop
