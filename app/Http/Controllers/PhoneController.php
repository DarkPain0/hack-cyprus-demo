<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneStore;
use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//not implement yet
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('entities.phone.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param PhoneStore|Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PhoneStore $request)
	{
		//create phone
		$phone = Phone::create($request->input());

		return redirect()
			->route('contacts.edit', ['id' => $phone->contact_id])
			->with('success', 'Phone Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Phone $phone
	 * @return \Illuminate\Http\Response
	 */
	public function show(Phone $phone)
	{
		//not implement yet
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Phone $phone
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Phone $phone)
	{
		$phone->load('contact');

		return view('entities.phone.edit', compact('phone'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param PhoneStore|Request $request
	 * @param Phone $phone
	 * @return \Illuminate\Http\Response
	 */
	public function update(PhoneStore $request, Phone $phone)
	{
		$phone->update($request->input());

		return redirect()
			->route('contacts.edit', ['id' => $phone->contact_id])
			->with('success', 'Phone Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Phone $phone
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Phone $phone)
	{
		$contactID = $phone->contact_id;
		$phone->delete();

		return redirect()
			->route('contacts.edit', ['id' => $contactID])
			->with('success', 'Phone Deleted');
	}
}
