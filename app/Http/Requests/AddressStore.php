<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStore extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'type' => 'required|string|max:255',
			'is_main' => 'required|boolean',
			'street' => 'required|string|max:255',
			'number' => 'nullable|string|max:255',
			'building' => 'nullable|string|max:255',
			'floor' => 'nullable|string|max:255',
			'apartment' => 'nullable|string|max:255',
			'postal_code' => 'nullable|string|max:255',
			'city' => 'nullable|string|max:255',
			'district' => 'nullable|string|max:255',
			'country' => 'nullable|string|max:255',
			'notes' => 'nullable|string|max:65,535'
		];
	}
}
