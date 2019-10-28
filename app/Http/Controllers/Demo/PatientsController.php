<?php

namespace App\Http\Controllers\Demo;

use App\Patient;
use App\Attribute;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Http\Requests\Demo\Patients\CreateRequest;
use App\Http\Requests\Demo\Patients\UpdateRequest;

class PatientsController extends Controller
{
    /**
     * Display a listing of the patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::get();

        return view('demo.patients.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = new Patient();

        $attributes = Attribute::get();

        return view('demo.patients.form', [
            'patient'    => $patient,
            'attributes' => $attributes,
        ]);
    }

    /**
     * Store a newly created patient in storage.
     *
     * @param \App\Http\Requests\Demo\Patients\CreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        $attributes = Arr::pull($data, 'attributes', []);

        $data = array_merge($data, $attributes);

        Patient::create($data);

        return redirect()->route('demo.patients.index')->with('message', 'Patient Saved.');
    }

    /**
     * Show the form for editing the specified patient.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $patient = Patient::findOrFail($id);

        $attributes = Attribute::get();

        return view('demo.patients.form', [
            'patient'    => $patient,
            'attributes' => $attributes,
        ]);
    }

    /**
     * Update the existing patient.
     *
     * @param \App\Http\Requests\Demo\Patients\UpdateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        $patient = Patient::findOrFail($request->route('id'));

        $data = $request->validated();

        $attributes = Arr::pull($data, 'attributes', []);

        $data = array_merge($data, $attributes);

        $patient->fill($data)->save();

        return redirect()->route('demo.patients.index')->with('message', 'Patient Saved.');
    }

    /**
     * Remove the given patient from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        Patient::findOrFail($id)->delete();

        return redirect()->route('demo.patients.index')->with('message', 'Patient Deleted.');
    }
}
