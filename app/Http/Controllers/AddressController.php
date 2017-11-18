<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\AddressStore;
use Illuminate\Http\Request;

class AddressController extends Controller
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
		return view('entities.address.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param AddressStore|Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(AddressStore $request)
	{
		//create address
		$address = Address::create($request->input());

		return redirect()
			->route('contacts.edit', ['id' => $address->contact_id])
			->with('success', 'Address Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Address $address
	 * @return \Illuminate\Http\Response
	 */
	public function show(Address $address)
	{
		//not implement yet
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Address $address
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Address $address)
	{
		$address->load('contact');

		return view('entities.address.edit', compact('address'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param AddressStore|Request $request
	 * @param Address $address
	 * @return \Illuminate\Http\Response
	 */
	public function update(AddressStore $request, Address $address)
	{
		$address->update($request->input());

		return redirect()
			->route('contacts.edit', ['id' => $address->contact_id])
			->with('success', 'Address Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Address $address
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Address $address)
	{
		$contactID = $address->contact_id;
		$address->delete();

		return redirect()
			->route('contacts.edit', ['id' => $contactID])
			->with('success', 'Address Deleted');
	}
}
