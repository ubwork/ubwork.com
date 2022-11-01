<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'name',
        'company_name',
        'address',
        'district',
        'company_model',
        'working_time',
        'city',
        'country',
        'zipcode',
        'phone',
        'email',
        'password',
        'logo',
        'link_web',
        'coin',
        'tax_code',
        'status'
    ];
}
