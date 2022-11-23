<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';
    protected $fillable = ['id','title','coin','amount','discount', 'expired','status', 'created_at', 'updated_at'];
    // public function invoices(){
    //     return $this->belongsTo(Invoices::class);
    // }
}
