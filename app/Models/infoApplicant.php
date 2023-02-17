<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoApplicant extends Model
{
    use HasFactory;
    protected $table = 'tbl_applicant_info';
    public $timestamps = false;
    protected $fillable = [
        'ref_num',
        'application_type',
        'digout_area',
        'name_of_applicant',
        'company_name',
        'telephone_no',
        'address',
        'parlimen',
        'road_involved'
    ];
}
