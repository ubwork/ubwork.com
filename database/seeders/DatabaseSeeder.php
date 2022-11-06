<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => '0123456789',
            'image'=> '',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        // //////////////////////////////////////////////////////////////////////////
        $dataBL=[
            [
                "candidate_id"=>1,
                "company_id"=>1,
                "status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ],
            [
                "candidate_id"=>2,
                "company_id"=>0,
                "status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ],
            [
                "candidate_id"=>0,
                "company_id"=>2,
                "status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ],
        ];
        DB::table('black_list')->insert($dataBL);

        $dataCC=[
            [
                "name"=>"Ngu kỳ",
                "email"=>"ky@gmail.com",
                "phone"=>"033325411",
                "status"=>1,
                "password"=>"123456789",
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ],
            [
                "name"=>"Ngu tuyên",
                "email"=>"tuyen@gmail.com",
                "phone"=>"033361511",
                "password"=>"123456789",
                "status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ],
        ];
        DB::table('candidates')->insert($dataCC);
        
        $dataCP=[
            [
                "name"=>"Ngu Sáng",
                "company_name"=>"công ty trách nghiệm 1 thành viên",
                "email"=>"sang@gmail.com",
                "phone"=>"03336668412",
                "password"=>"123456789",
                "address"=>"số 1 lâm viên",
                'district'=>"hoàng mai",
                'company_model'=>"lớn",
                'working_time'=>"12",
                'city'=>"hà nội",
                'country'=>'123467',
                'zipcode'=>'1234678',
                'logo'=>'13423467',
                'link_web'=>"1232456",
                'coin'=>"1",
                'tax_code'=>'213243',
                "status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ],
            [
                "name"=>"Ngu thắng",
                "company_name"=>"công ty trách nghiệm 1 thành viên",
                "email"=>"thang@gmail.com",
                "phone"=>"032574986",
                "password"=>"123456789",
                "address"=>"số 1 lâm viên",
                'district'=>"hoàng mai",
                'company_model'=>"bé",
                'working_time'=>"12",
                'city'=>"hà nội",
                'country'=>'123467',
                'zipcode'=>'1234678',
                'logo'=>'13423467',
                'link_web'=>"1232456",
                'coin'=>"1",
                'tax_code'=>'213243',
                "status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ],
        ];
        DB::table('companies')->insert($dataCP);
    }
}
