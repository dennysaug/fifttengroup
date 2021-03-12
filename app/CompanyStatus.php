<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CompanyStatus
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $companies
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyStatus query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CompanyStatus whereUpdatedAt($value)
 */
class CompanyStatus extends Model
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
