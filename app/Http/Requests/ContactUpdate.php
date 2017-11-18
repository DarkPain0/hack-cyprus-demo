<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdate extends FormRequest
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
			'name' => 'required_if:is_company,0|string|max:255',
			'surname' => 'required_if:is_company,0|string|max:255',
			'is_company' => 'required|boolean',
			'company_name' => 'nullable|required_if:is_company,1|string|max:255',
			'gender' => 'nullable|string|max:255',
			'birth' => 'nullable|date|before:now',
			'occupation' => 'nullable|string|max:255',
			'notes' => 'nullable|string|max:65535'
		];
	}
}
