<?php

class PatientsController extends \BaseController {

	/**
	 * Display a listing of the patients.
	 *
	 * @return Response
	 */
	public function index()
	{
		$patients = Patient::all();

		return View::make('patients.index', compact('patients'));
	}

	/**
	 * Show the form for creating a new patient.
	 *
	 * @return Response
	 */
	public function create()
	{
		$attributes = Attribute::all();

		return View::make('patients.create', compact('attributes'));
	}

	/**
	 * Store a newly created patient in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Patient::create(
			Input::except('_token')
		);

		return Redirect::to('patients')->with('message', 'Patient Saved.');
	}

	/**
	 * Display the specified patient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$patient = Patient::find($id);

		return View::make('patients.show', compact('patient'));
	}

	/**
	 * Show the form for editing the specified patient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patient = Patient::find($id);
		$attributes = Attribute::all();

		return View::make('patients.edit', compact('patient', 'attributes'));
	}

	/**
	 * Update the specified patient in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$patient = Patient::find($id);

		$patient->fill(Input::except('_token'))->update();

		return Redirect::to('patients/' . $id . '/edit')->with('message', 'Patient Saved.');
	}

}
