<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @property-read \App\CompanyStatus $companyStatus
 * @property-read \App\CompanyType $companyType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contact[] $contacts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $company_type_id
 * @property int $company_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCompanyStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCompanyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUpdatedAt($value)
 */
class Company extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'company_type_id',
        'company_status_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function companyStatus()
    {
        return $this->belongsTo(CompanyStatus::class);
    }

}
