<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobPost;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
        $this->v['activeRoute'] = 'dashboard';
    }
    public function home(){
        $this->v['title'] = "Tổng quan";
        $company_id = auth('company')->user()->id;
        $this->v['JobPost'] = JobPost::with('activities')->where('company_id',$company_id)->get();
        $this->v['Applied'] = 0;
            foreach($this->v['JobPost'] as $post){
                $this->v['Applied'] += $post->activities()->count();
            }
        return view('company.dashboard',$this->v);
    }
}
