<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class candidates extends Model
{
    use HasFactory;
    protected $table = "candidates";
    protected $fillable = ['id', 'name', 'email', 'password', 'phone', 'gender'];

    public function loadList($param = []){
        $query = DB::table($this->table)
            ->select($this->fillable)
            ->orderBy('id', 'desc');

        $lists = $query->paginate(5);
        return $lists;
    }

    //  // lưu tạo user
    public function saveAddUser($params) {
        $data = $params['cols'];
        $res = DB::table($this->table)->insert($data);
        return $res;
    }

    // lấy dữ liệu ra bảng cập nhật user
    public function loadOne($id, $params = null){
        $query = DB::table($this->table)
            ->where('id', '=', $id);

        $obj = $query->first();
        return $obj;
    }
    public function register($params)
    {
        $data = array_merge(
            $params['cols'],
            ['password' => Hash::make($params['cols']['password'])]
        );
        $res = DB::table($this->table)->insert($data);
        return $res;
    }
}
