<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Company extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $fillable = ['id', 'name', 'company_name', 'address', 'district', 'company_model', 'working_time', 'city', 'country', 'zipcode', 'phone', 'email', 'password', 'logo', 'link_web', 'coin', 'tax_code', 'is_active', 'status', 'created_at', 'updated_at'];
    public function loadList($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
    }
    public function companyDetail($id)
    {
        $query = DB::table($this->table)
            ->where('id', '=', $id);
        $lists = $query->first();
        return $lists;
    }
    public function saveNew($param)
    {
        $data = array_merge(
            $param['cols']
        );
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    public function loadOne($id, $params = null)
    {
        $query = DB::table($this->table)
            ->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }
    public function saveUpdate($params)
    {
        if (empty($params['cols']['id'])) {
            Session::flash('error', 'Không xác định bản ghi cập nhật');
            return null;
        }
        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') continue;
            if (in_array($colName, $this->fillable)) {
                $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }
    public function deleteRoom($id)
    {
        $query = DB::table($this->table)
            ->where('id', '=', $id);
        $lists = $query->delete();
        return $lists;
    }
}
