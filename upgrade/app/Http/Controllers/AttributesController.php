<?php

class AttributesController extends \BaseController {

	/**
	 * Display a listing of the attributes.
	 *
	 * @return Response
	 */
	public function index()
	{
		$attributes = Attribute::all();

		return View::make('attributes.index', compact('attributes'));
	}

	/**
	 * Show the form for creating a new attribute.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('attributes.create');
	}

	/**
	 * Store a newly created attribute in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$options = array();

		foreach (Input::get('options', array()) as $option)
		{
			if ( ! $option['key'] and ! $option['value']) continue;

			$options[$option['key']] = $option['value'];
		}

		$input = array_merge(Input::except('options', '_token'), compact('options'));

		Attribute::create($input);

		return Redirect::to('attributes')->with('message', 'Attribute Saved.');
	}

	/**
	 * Remove the specified attribute from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Attribute::find($id)->delete();

		return Redirect::to('attributes')->with('message', 'Attribute Deleted.');
	}

}
