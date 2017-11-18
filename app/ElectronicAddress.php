<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\ElectronicAddress
 *
 * @property int $id
 * @property int $contact_id
 * @property string $type
 * @property int $is_main
 * @property string|null $value
 * @property string|null $notes
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Contact $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\ElectronicAddress onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ElectronicAddress whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElectronicAddress withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ElectronicAddress withoutTrashed()
 * @mixin \Eloquent
 */
class ElectronicAddress extends Model
{
	use SoftDeletes;

	protected $fillable = ['type', 'is_main', 'value', 'notes'];

	protected $appends = ['info'];

	public function contact()
	{
		return $this->belongsTo(Contact::class);
	}

	public function getInfoAttribute()
	{
		return $this->value . ' (' . $this->type . ')';
	}
}
