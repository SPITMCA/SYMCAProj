<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTP_mail; 

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Stroage;

class hosp_regist extends Controller
{
    
    public function hosp_login_data(request $request ){

        $h_log=DB::select('select * from hospital where h_uname=? and h_pass=?',[$request->log_uname,$request->log_pass]);

            if(count($h_log)>0){
                $request->session()->put('hosp_uname',$request->log_uname);
                return view('hosp_home');
            }
            else{
            Alert::error('Wrong Credentials','Please enter correct credentials');
            return view('hosp_login');
            }

    }

    public function claim_form(request $request){

        if(session()->has('hosp_uname')){
                                        
            $ses_hosp_uname=$request->session()->get('hosp_uname');
            $hosp_id=DB::select('select * from hospital where h_uname=?',[$ses_hosp_uname]);

            $cover=DB::select('select * from sub_scheme_covers');

            foreach($hosp_id as $hosp_id){
               $hid=$hosp_id->h_id;
            }

            return view('claim_form',compact('hid','cover'));
        }
        else{
            abort(500);
        }

    }

    
    public function otp_gen($otp_cid,$otp_cvname){
        
        $otp_cvid_db=DB::select('select * from sub_scheme_covers where cv_name=? ',[$otp_cvname]);
        foreach($otp_cvid_db as $otp_cvid_db){
            $otp_cvid_val=$otp_cvid_db->cv_id;
         }
        
        $otp_cust_valid=DB::select('select * from alloted_scheme where as_cid=? and as_cvid=?',[$otp_cid,$otp_cvid_val]);
        
        if(count($otp_cust_valid)>0){
            
            $rand_no=rand(1000,9999);
            DB::update('update customer set cust_otp=? where cust_id=?',[$rand_no,$otp_cid]);

            $otp_mail=DB::select('select * from customer where cust_id=?',[$otp_cid]);

            foreach($otp_mail as $otp_mail){
                $otp_mail_val=$otp_mail->cust_email;
             }

            $details=[
                'title'=>'OTP for Claim requested',
                'body'=>'Dear user , Your OTP for claim requested is.',
                'body1'=>$rand_no,
    
            ];
    
            Mail::to($otp_mail_val)->send(new OTP_mail($details)); 
     
            
        }
        else{
            abort(500,'invalid user');
        }

    }

    public function claim_submitted(Request $request){

        $hos_cid=$request->h_cust_id;
        $hos_cvname=$request->h_cust_cvname;
        $hos_med_desc=$request->h_cust_md;
        $hos_camt=$request->h_cust_amt;
        $hos_std=$request->h_cust_std;
        $hos_end=$request->h_cust_end;
        $hos_otp=$request->h_cust_otp;
        $hos_no_doc=$request->h_doc_no;
        $hos_hid=$request->h_cust_hid;

        
        $hos_otp_val=DB::select('select * from customer where cust_id=? and cust_otp=?',[$hos_cid,$hos_otp]);
        
        $hos_ssc_val=DB::select('select * from sub_scheme_covers where cv_name=?',[$hos_cvname]);

         foreach($hos_ssc_val as $hos_ssc_val){
            $hos_ssc_amt=$hos_ssc_val->cv_amount;
            $hos_ssc_cvid=$hos_ssc_val->cv_id;
         }


        if(count($hos_otp_val)>0){
            if($hos_camt<=$hos_ssc_amt){

                DB::insert('insert into hospital_claim(hc_desc,hc_amt,hc_cid,hc_hid,hc_cvid,hc_sdt,hc_edt) values(?,?,?,?,?,?,?)',[$hos_med_desc,$hos_camt,$hos_cid,$hos_hid,$hos_ssc_cvid,$hos_std,$hos_end]);
                
                if($hos_no_doc>0){

                    $hos_last_claim=DB::select('select * from hospital_claim ORDER BY hc_id DESC LIMIT 1');
                    foreach($hos_last_claim as $hos_last_claim){
                        $last_hid=$hos_last_claim->hc_id;
                     }
                    
                    for($i=1; $i<=$hos_no_doc ;$i++){
                        
                        $doc_name_value='hc_doc_name'.$i;
                        $file_value='h_cust_doc'.$i;

                        $hcd_name=$request->$doc_name_value;
                        $hcd_file=$request->$file_value;
                        
                        
                         $filename=$hcd_name.'.'.$hcd_file->getClientOriginalExtension();

                         $hcd_file->move('images/claim_doc',$filename);

                         DB::insert('insert into hospital_claim_doc(hcd_name,hcd_file,hcd_hcid) values(?,?,?)',[$hcd_name,$filename,$last_hid]);
                     }
                }

                DB::update('update customer set cust_otp=?',[NULL]);
                 return "success";

            }
            else{
                
                DB::update('update customer set cust_otp=?',[NULL]);
                abort(500,'cvr_out_range');
            }
        }
        else{
            
            DB::update('update customer set cust_otp=?',[NULL]);
            abort(401,'inv_otp');
        }



    }

    
public function report1(request $request,$year,$dis_type){

    if(session()->has('hosp_uname')){

        $post=DB::select('select count(hc_desc) as total_distype , month(hc_date) as per_month from hospital_claim where year(hc_date)=? and hc_desc=? group by per_month order by per_month ',[$year,$dis_type]);
        $top_idea_report=DB::select('select * from hospital_claim where year(hc_date)=? and hc_desc=?',[$year,$dis_type]);
    
    

    $year2=DB::select('select distinct(year(hc_date)) as hc_date_yr from  hospital_claim');
    $dis_ty=DB::select('select distinct(hc_desc) as hc_desc_dis from  hospital_claim');

    
    if(count($post)==0){
        if(session()->has('report1_sess')){
            session()->pull('report1_sess');
        }
        return view('hosp_home');
    }
    else{

        $request->session()->put('report1_sess','report1_session');

    foreach($post as $row)
    {
        $data[]=array
        (
           'label'=>$row->per_month,
           'y'=>$row->total_distype
        );
    }
    

    return view('Reports.report1',compact('top_idea_report','year2','dis_ty'),['data'=>$data]);
}
    }
}

}
