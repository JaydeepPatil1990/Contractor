<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'contractor_id','road_type_id','contract_no','start_date','end_date','contract_amount','penalty',
        'warranty','location','address_line_1','address_line_2','city','state','country','short_description','long_description','status'
    ];

    public function Contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function RoadType()
    {
        return $this->belongsTo(RoadType::class);
    }
}
