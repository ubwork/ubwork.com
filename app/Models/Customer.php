<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    // public $timestamps = false;
    protected $fillable = ['id', 'name', 'avatar', 'email', 'password', 'phone', 'address', 'position', 'gender',
    'city', 'coin', 'is_active', 'deleted_at', 'status', 'created_at', 'updated_at'];

    // Lấy dữ liệu ra bảng
    public function loadList($param = []){
        $query = DB::table($this->table)
               ->select($this->fillable)
               ->where('deleted_at', '=', '0')
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
               ->where('id', '=', $id);

        $obj = $query->first();
        return $obj;
    }

    // lưu cập nhật
    public function saveUpdatePro($params) {
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
}
