<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CompanyType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $companies
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyType query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyType whereUpdatedAt($value)
 */
class CompanyType extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

}
