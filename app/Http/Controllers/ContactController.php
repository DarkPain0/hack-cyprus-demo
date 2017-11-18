<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactStore;
use App\Http\Requests\ContactUpdate;
use App\Traits\CanNotify;
use Illuminate\Http\Request;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{

	use CanNotify;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$contactQuery = Contact::query();
		$contactQuery->withCount('phones', 'addresses', 'electronicAddresses');
		$contactQuery->with('phones', 'addresses', 'electronicAddresses');

		if (!\request()->user()->is_admin) {
			$contactQuery->doesntHave('user');
		}

		if (request()->has('is_company')) {
			$contactQuery->where('is_company', \request('is_company'));
		}

		$contacts = $contactQuery->orderBy('updated_at', 'DESC')
			->paginate(20);

		return view('entities.contact.index', compact('contacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('entities.contact.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ContactStore|Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(ContactStore $request)
	{
		//create contact
		$contact = Contact::create($request->all());

		//notify user
		$this->notifySuccess('Contact Saved');

		return redirect()->route('contacts.edit', ['id' => $contact->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Contact $contact
	 * @return \Illuminate\Http\Response
	 */
	public function show(Contact $contact)
	{
		$contact->load('phones', 'addresses', 'electronicAddresses');
		return view('entities.contact.show', compact('contact'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Contact $contact
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Contact $contact)
	{
		$contact->load('phones', 'addresses', 'electronicAddresses');
		return view('entities.contact.edit', compact('contact'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param ContactUpdate|Request $request
	 * @param Contact $contact
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(ContactUpdate $request, Contact $contact)
	{
		//update contact
		$contact->update($request->all());

		//notify user
		$this->notifySuccess('Contact Updated');

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Contact $contact
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Contact $contact)
	{
		//delete contact
		$contact->load('user', 'phones', 'addresses', 'electronicAddresses');
		if (optional($contact->user)->is_admin === 1) {
			$this->notifyError('Cannot delete contact that belongs to User');
			return response('Cannot delete contact that belongs to User', 501);
		}
		$contact->phones->each->delete();
		$contact->addresses->each->delete();
		$contact->eAddresses->each->delete();
		$contact->delete();

		//notify user
		$this->notifySuccess('Contact Deleted');

		return redirect()->route('contacts.index');

	}
}
