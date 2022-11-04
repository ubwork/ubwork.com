<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class Candidates extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'candidates';
    // public $timestamps = false;
    protected $fillable = ['id', 'name', 'avatar', 'email', 'password', 'phone', 'address', 'position', 'gender',
    'city', 'coin', 'deleted_at', 'status', 'created_at', 'updated_at'];

    // Lấy dữ liệu ra bảng
    public function loadList($param = []){
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->where('deleted_at', null)
               ->orderBy('id', 'desc');

        $lists = $query->paginate(9);
        return $lists;
    }

    // lưu tạo
    public function saveAdd($params) {
        $data = array_merge($params['cols'], [
            'password' => Hash::make($params['cols']['password']),
        ]);
        $res = DB::table($this->table)->insert($data);
        return $res;
    }

    // lấy dữ liệu ra bảng cập nhật
    public function loadOne($id, $params = null){
        $query = DB::table($this->table)
               ->where('deleted_at', '=', null)
               ->where('id', '=', $id);

        $obj = $query->first();
        return $obj;
    }

    // lưu cập nhật
    public function saveUpdate($params) {
        if(empty($params['cols']['id'])) {
            Session::flash('error', 'Không xác định bản cập nhật');
            return null;
        }
        $data = [];
        foreach($params['cols'] as $colName => $val) {
            if($colName == 'id') continue;
            if(in_array($colName, $this->fillable)) {
                $data[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $res = DB::table($this->table)
        ->where('id', '=', $params['cols']['id'])
        ->update($data);
        return $res;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
