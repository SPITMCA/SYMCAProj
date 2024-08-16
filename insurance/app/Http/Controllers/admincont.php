<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class admincont extends Controller
{
    public function insurance_ins(request $request ){

        $ins_name=$request->ins_name;
        $ins_type=$request->ins_type;

       $ins_c= DB::insert('insert into insurances(ins_name,ins_type) values(?,?)',[$ins_name,$ins_type]);

       return response()->json($ins_c);
    }


    public function admin_cv_ins(request $request ){

        $ins_name=$request->ins_name;
        $cvins_id=DB::select('select ins_id from insurances where ins_name=?',[$ins_name]);

        foreach($cvins_id as $cvins_id){
            $cvins_id=$cvins_id->ins_id;
        }

        $cv_name=$request->cv_name;
        $cv_amount=$request->cv_amount;
        $cv_price=$request->cv_price;

        
       $chk= DB::insert('insert into sub_scheme_covers(cv_name,cv_amount,cv_price,cv_insid) values(?,?,?,?)' , [$cv_name,$cv_amount,$cv_price,$cvins_id]);
        
            return $chk;
    }

}
