<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoApplicant extends Model
{
    use HasFactory;
    protected $table = 'tbl_application';
    public $timestamps = false;
    protected $fillable = [
        'ref_num',
        'cabel_length',
        'type_application',
        'name_of_applicant',
        'company_name',
        'telephone_no',
        'address',
        'parlimen',
        'road_involved',
        'division',
        'created_by',
        'work_type',
        'before_image',
        'after_image',
        'status',
        'file_no',
        'approved_file_no',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'work_status',
    ];
}
