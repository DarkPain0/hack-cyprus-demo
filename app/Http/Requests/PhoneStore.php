<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneStore extends FormRequest
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
			'number' => 'required|string|max:255',
			'country' => 'nullable|string|max:255',
			'extension' => 'nullable|string|max:255',
			'notes' => 'nullable|string|max:65,535',
			'contact_id' => 'required|exists:contacts,id'
		];
	}
}
