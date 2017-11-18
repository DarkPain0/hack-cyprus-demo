<?php

namespace App\Http\Controllers;

use App\ElectronicAddress;
use App\Http\Requests\ElectronicAddressStore;
use Illuminate\Http\Request;

class ElectronicAddressController extends Controller
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
		return view('entities.electronic_address.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ElectronicAddressStore|Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ElectronicAddressStore $request)
	{
		//create e-address
		$eAddress = ElectronicAddress::create($request->input());

		return redirect()
			->route('contacts.edit', ['id' => $eAddress->contact_id])
			->with('success', 'Electronic Address Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param ElectronicAddress $electronicAddress
	 * @return \Illuminate\Http\Response
	 */
	public function show(ElectronicAddress $electronicAddress)
	{
		//not implement yet
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param ElectronicAddress $electronicAddress
	 * @return \Illuminate\Http\Response
	 */
	public function edit(ElectronicAddress $electronicAddress)
	{
		$electronicAddress->load('contact');

		return view('entities.electronic_address.edit', compact('electronicAddress'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param ElectronicAddressStore|Request $request
	 * @param ElectronicAddress $electronicAddress
	 * @return \Illuminate\Http\Response
	 */
	public function update(ElectronicAddressStore $request, ElectronicAddress $electronicAddress)
	{
		$electronicAddress->update($request->input());

		return redirect()
			->route('contacts.edit', ['id' => $electronicAddress->contact_id])
			->with('success', 'Electronic Address Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param ElectronicAddress $electronicAddress
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(ElectronicAddress $electronicAddress)
	{
		$contactID = $electronicAddress->contact_id;
		$electronicAddress->delete();

		return redirect()
			->route('contacts.edit', ['id' => $contactID])
			->with('success', 'Electronic Address Deleted');
	}
}
