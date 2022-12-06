<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name','company_type_id','contact_person_name','contact_number','email','status',
    ];

    public function companyType()
    {
        return $this->belongsTo(companyType::class);
    }
}
