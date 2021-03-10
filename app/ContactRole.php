<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContactRole
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contact[] $contacts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactRole query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactRole whereUpdatedAt($value)
 */
class ContactRole extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

}
