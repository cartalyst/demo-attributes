<?php namespace App\Http\Controllers;

use Request;
use App\Attribute;
use App\Patient;

class PatientsController extends Controller {

	/**
	 * Display a listing of the patients.
	 *
	 * @return Response
	 */
	public function index()
	{
		$patients = Patient::all();

		return view('patients.index', compact('patients'));
	}

	/**
	 * Show the form for creating a new patient.
	 *
	 * @return Response
	 */
	public function create()
	{
		$attributes = Attribute::all();

		return view('patients.create', compact('attributes'));
	}

	/**
	 * Store a newly created patient in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Patient::create(
			Request::except('_token')
		);

		return redirect('patients')->with('message', 'Patient Saved.');
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

		return view('patients.show', compact('patient'));
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

		return view('patients.edit', compact('patient', 'attributes'));
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

		$patient->fill(Request::except('_token'))->update();

		return redirect('patients/' . $id . '/edit')->with('message', 'Patient Saved.');
	}

}
