<?php

namespace App\Http\Controllers\Demo;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\Demo\Attributes\CreateRequest;
use App\Http\Requests\Demo\Attributes\UpdateRequest;

class AttributesController extends Controller
{
    /**
     * Display a listing of the attributes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::get();

        return view('demo.attributes.index', ['attributes' => $attributes]);
    }

    /**
     * Show the form for creating a new attribute.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attribute = new Attribute();

        return view('demo.attributes.form', ['attribute' => $attribute]);
    }

    /**
     * Store a newly created attribute in storage.
     *
     * @param \App\Http\Requests\Demo\Attributes\CreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        Attribute::create($request->validated());

        return redirect()->route('demo.attributes.index')->with('message', 'Attribute Saved.');
    }

    /**
     * Show the form for editing an existing attribute.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('demo.attributes.form', ['attribute' => $attribute]);
    }

    /**
     * Update the existing attribute.
     *
     * @param \App\Http\Requests\Demo\Attributes\UpdateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        $attribute = Attribute::findOrFail($request->route('id'));

        $attribute->update($request->validated());

        return redirect()->route('demo.attributes.index')->with('message', 'Attribute Saved.');
    }

    /**
     * Remove the given attribute from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        Attribute::findOrFail($id)->delete();

        return redirect()->route('demo.attributes.index')->with('message', 'Attribute Deleted.');
    }
}
