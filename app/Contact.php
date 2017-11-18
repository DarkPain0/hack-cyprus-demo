<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Contact
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property int $is_company
 * @property string|null $company_name
 * @property string|null $gender
 * @property string|null $birth
 * @property string|null $occupation
 * @property string|null $notes
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ElectronicAddress[] $eAddresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Phone[] $phones
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Contact onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereIsCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Contact withoutTrashed()
 * @mixin \Eloquent
 */
class Contact extends Model
{
	use SoftDeletes;

	protected $fillable = ['name', 'surname', 'is_company', 'company_name', 'gender', 'birth', 'occupation', 'notes'];

	protected $casts = ['birth' => 'date'];

	protected $appends = ['info'];

	public function user()
	{
		return $this->hasOne(User::class);
	}

	public function phones()
	{
		return $this->hasMany(Phone::class);
	}

	public function addresses()
	{
		return $this->hasMany(Address::class);
	}

	public function electronicAddresses()
	{
		return $this->hasMany(ElectronicAddress::class);
	}

	public function getInfoAttribute()
	{
		if ($this->is_company) {
			return $this->company_name;
		}
		return $this->name . ' ' . $this->surname;
	}
}
