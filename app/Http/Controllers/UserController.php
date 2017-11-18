<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::with('contact')
			->paginate(20);
		return view('entities.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//not implemented
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//not implemented
	}

	/**
	 * Display the specified resource.
	 *
	 * @param User $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		//not implemented
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param User $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		$user->load('contact');
		return view('entities.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param User $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		$data = $request->validate(
			[
				'email' => 'required|string|email|max:255|' . Rule::unique('users')
						->ignore($user->id),
				'password' => 'required|string|min:6|confirmed',
				'is_admin' => 'required|boolean'
			]);
		$data['password'] = bcrypt($data['password']);
		$user->update($data);
		return back()->with('success', 'User Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param User $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		//not implemented
	}
}
