<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactAddress extends Model
{
    protected $fillable = [
        'contact_id',
        'address',
        'default'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }


    /**
     * @param $contact_id
     * @param $except_id
     */
    static function setDefault($contact_id, $except_id)
    {
        // when set 'Y' for address, we need set 'N' for another address.
        if(is_numeric($contact_id) && is_numeric($except_id)) {
            DB::update("
                UPDATE contact_addresses SET
                contact_addresses.default = 'N'
                WHERE contact_addresses.contact_id = ? and contact_addresses.id <> ?;
            ", [$contact_id, $except_id]);
        }
    }
}
