<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Phone
 *
 * @property int $id
 * @property int $contact_id
 * @property string $type
 * @property int $is_main
 * @property string|null $country
 * @property string|null $number
 * @property string|null $extension
 * @property string|null $notes
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Contact $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Phone onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Phone withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Phone withoutTrashed()
 * @mixin \Eloquent
 */
class Phone extends Model
{
	use SoftDeletes;

	protected $fillable = ['type', 'is_main', 'country', 'number', 'extension', 'notes', 'contact_id'];

	protected $appends = ['info'];

	public function contact()
	{
		return $this->belongsTo(Contact::class);
	}

	public function getInfoAttribute()
	{
		return $this->number . ' (' . $this->type . ')';
	}
}
