<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;
    protected   $table      = 'tbl_permit_application';
    public      $timestamps = false;

    protected $fillable     = [
        'job_title',
        'section_c',
        'section_d',
        'section_b',
        'application_id',
        'total_section_c',
        'total_section_d',
    ];
}
