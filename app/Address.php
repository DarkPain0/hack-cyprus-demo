<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Address
 *
 * @property int $id
 * @property int $contact_id
 * @property string $type
 * @property int $is_main
 * @property string|null $street
 * @property string|null $number
 * @property string|null $building
 * @property string|null $floor
 * @property string|null $apartment
 * @property string|null $postal_code
 * @property string|null $city
 * @property string|null $district
 * @property string|null $country
 * @property string|null $notes
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Contact $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Address onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereApartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Address withoutTrashed()
 * @mixin \Eloquent
 */
class Address extends Model
{
	use SoftDeletes;

	protected $fillable = ['type', 'is_main', 'street', 'number', 'building', 'floor', 'apartment', 'postal_code', 'city', 'district', 'country', 'notes'];

	protected $appends = ['info'];

	public function contact()
	{
		return $this->belongsTo(Contact::class);
	}

	public function getInfoAttribute()
	{
		return $this->street . ' ' . $this->number . ' ' . $this->city . ' ' . $this->country . ' (' . $this->type . ')';
	}
}
