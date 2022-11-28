<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert; 
use thiagoalessio\tesseract_ocr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Mail\paysuccess_mail;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;


class regist extends Controller
{
    public function regist_ins(request $request ){
      sleep(5);

        $curyr = date('Y');
        
        $cust_fname=$request->fname;
        $cust_mname=$request->mname;
        $cust_lname=$request->lname;
        $cust_gen=$request->gender;
        $cust_age=$request->age;
        $cust_email=$request->email;
        $cust_mb=$request->mbno;
        $cust_city=$request->city;
        $cust_uname=$request->uname;
        $cust_pass=$request->pass;
        //$cust_cnfpass=$request->cnfpass;

        $username=DB::select('select * from customer where cust_uname=?',[$cust_uname]);
        if(count($username)>0){
            abort(500,'something went wrong');
        }
        else{

         $ins=DB::insert('insert into customer(cust_firstname,cust_middlename,cust_lastname,cust_gender,cust_age,cust_email,cust_mb,cust_city,cust_uname,cust_pass) values(?,?,?,?,?,?,?,?,?,?)', [$cust_fname,$cust_mname,$cust_lname,$cust_gen,$cust_age,$cust_email,$cust_mb,$cust_city,$cust_uname,$cust_pass]);
         
         return "success";
        }
    }


    public function cust_login( request $request ){

        $cust_l_uname=$request->log_uname;
        $cust_l_pass=$request->log_pass;

        $cust_l=DB::select('select * from customer where cust_uname=? and cust_pass=?',[$cust_l_uname,$cust_l_pass]);

        if(count($cust_l)>0){
            $request->session()->put('cust_uname',$cust_l_uname);
            return view('/insurances_all');
        }
        else{
            Alert::error('Wrong Credentials','Please enter correct credentials');
            return view('login');
        }

        //return response()->json($cust_l);

    }

    public function cust_logout(){
        if(session()->has('cust_uname')){
            session()->pull('cust_uname');
        }
        return redirect('/');
    
    }

    public function ins_form(request $request ,$cover_name){

        

        if(session()->has('cust_uname')){

            
            $cust_doc_uname=$request->session()->get('cust_uname');
            $cust_uml=DB::select('select * from customer where cust_uname=?',[$cust_doc_uname]);

            foreach($cust_uml as $cust_uml){
                $doc_main_uname=$cust_uml->cust_firstname.' '.$cust_uml->cust_middlename.' '.$cust_uml->cust_lastname;
                $docmain_age=$cust_uml->cust_age;
                $cust_iid=$cust_uml->cust_id;
            }

            $cust_cvr=DB::select('select * from sub_scheme_covers where cv_name=?',[$cover_name]);

            foreach($cust_cvr as $cust_cvr){
                $cvr_price=$cust_cvr->cv_price;
                $cvr_id=$cust_cvr->cv_id;
            }
            
            return view('ins_form',['doc_main_uname' => $doc_main_uname,'docmain_age' => $docmain_age,'cvr_price' => $cvr_price,'cvr_id' => $cvr_id,'cust_iid' => $cust_iid]);
        }
        else{
            abort(500);
        }
    }

    public function doc_check(request $request){
        
        $uadno=$request->ins_uano;
        $ufile=$request->ins_ufile;
        $doc_main_uname=$request->doc_main_uname;
        $ins_uage=$request->ins_uage;
        $doc_verified=$request->doc_verified;
        $as_u=$request->as_u;

        //id....
        $u_dform_id=$request->u_dform_id;
        // $clr_form_id=$request->clr_form_id;

        


        
        $filename=$uadno.'.'.$ufile->getClientOriginalExtension();

        $request->ins_ufile->move('images/doc_check',$filename);

        $cvr_id=$request->cvr_id;
        $cust_iid=$request->cust_iid;
        DB::insert('insert into doc(doc_name,doc_file,doc_cid,doc_cvid) values(?,?,?,?)',["Aadhar Card",$filename,$cust_iid,$cvr_id]);


        
        $response = [
            'uadno' => $uadno,
            'filename' => $filename,
            'doc_main_uname' => $doc_main_uname,
            'doc_verified' => $doc_verified,
            'u_dform_id' => $u_dform_id,
            // 'clr_form_id' => $clr_form_id,
            'cvr_id'=>$cvr_id,
            'cust_iid'=>$cust_iid,
            'as_u'=>$as_u
        ];

        return response()->json($response);

    }

    public function data_upload(request $request){

            
        $uadno=$request->ins_uano;
        $ufile=$request->ins_ufile;
        $doc_main_uname=$request->doc_main_uname;
        $ins_uage=$request->ins_uage;
        $cust_iid=$request->cust_iid;
        

        $cvr_id=$request->cvr_id;

        $regis_main_uname=$request->session()->get('cust_uname');
        $regis_main=DB::select('select * from customer where cust_uname=?',[$regis_main_uname]);

        foreach($regis_main as $regis_main){
            $main_uname=$regis_main->cust_firstname.' '.$regis_main->cust_middlename.' '.$regis_main->cust_lastname;
            // $main_cid=$regis_main->cust_id;
        }

        if($main_uname==$doc_main_uname){
            
            // $cvr_id=$request->cvr_id;
            $benif_val=$request->benif;
            $ins_regis_main= DB::insert('insert into alloted_scheme(as_cid,as_cvid,as_benefi) values(?,?,?)',[$cust_iid,$cvr_id,$benif_val]);
        }
        else{
            // $cvr_id=$request->cvr_id;
            $al_data=DB::select('select * from alloted_scheme where as_cid=? and as_cvid=?',[$cust_iid,$cvr_id]);

            if(count($al_data)>0){
                
                foreach($al_data as $al_data){
                    $als_id=$al_data->as_id;
                }

                DB::insert('insert into alloted_scheme_members(asm_name,asm_age,asm_asid) values(?,?,?)',[$doc_main_uname,$ins_uage,$als_id]);
                return "main_succ";   
            }
            else{
                return "main_user_err";
            }

        }

                

    }

    public function doc_del($cvr_id_del,$cust_iid_del,$as_u,$username_del) {

        // $del_dataa=DB::select('select * from doc where doc_cid=? and doc_cvid=?',[$cust_iid_del,$cvr_id_del]);

        $del_dataa=DB::select('select * from doc ORDER BY doc_id DESC LIMIT 1');

        foreach($del_dataa as $del_dataa){
            $filename_del=$del_dataa->doc_file;
        }

       $filepath= 'E:/Insurance/insurance/public/images/doc_check/'. $filename_del;
    
        File::delete($filepath);
        // DB::delete('delete from doc where doc_cid=? and doc_cvid=?',[$cust_iid_del,$cvr_id_del]);
        DB::delete('delete from doc where doc_id=?',[$del_dataa->doc_id]);
        

        return "detele_file_done";        
    }

    
    // public function doc_del_btn($cvr_id_del,$cust_iid_del,$as_u,$username_del) {

    //     $del_dataa=DB::select('select * from doc where doc_cid=? and doc_cvid=?',[$cust_iid_del,$cvr_id_del]);

    //     foreach($del_dataa as $del_dataa){
    //         $filename_del=$del_dataa->doc_file;
    //     }

    //    $filepath= 'E:/Insurance/insurance/public/images/doc_check/'. $filename_del;
    
    //     File::delete($filepath);
        

    //     DB::delete('delete from doc where doc_cid=? and doc_cvid=?',[$cust_iid_del,$cvr_id_del]);
        
    //      if($as_u=='as'){
           
    //         DB::delete('delete from alloted_scheme where as_cid=? and as_cvid=?',[$cust_iid_del,$cvr_id_del]);
    //      }
    //      else{
    //          $asm_data=DB::select('select * from alloted_scheme where as_cid=? and as_cvid=?',[$cust_iid_del,$cvr_id_del]);
    //          foreach($asm_data as $asm_data){
    //              $asm_as_id=$asm_data->as_id;
    //          }
    //          DB::delete('delete from alloted_scheme_members where asm_asid=? and asm_name=?',[$asm_as_id,$username_del]);
    //      }

    //     return "detele_done";        
    // }

    public function doc_del_btn($cvr_id_del,$cust_iid_del) {

        $del_dataa=DB::select('select * from doc where doc_cid=? and doc_cvid=?',[$cust_iid_del,$cvr_id_del]);

        foreach($del_dataa as $del_dataa){
            $filename_del=$del_dataa->doc_file;
                    
            $filepath= 'E:/Insurance/insurance/public/images/doc_check/'. $filename_del;
            
            File::delete($filepath);
        }

        

             DB::delete('delete from doc where doc_cid=? and doc_cvid=?',[$cust_iid_del,$cvr_id_del]);
        
           
         
             $asm_data=DB::select('select * from alloted_scheme where as_cid=? and as_cvid=?',[$cust_iid_del,$cvr_id_del]);
             foreach($asm_data as $asm_data){
                 $asm_as_id=$asm_data->as_id;
             }
             DB::delete('delete from alloted_scheme_members where asm_asid=? ',[$asm_as_id]);
         
            
             DB::delete('delete from alloted_scheme where as_cid=? and as_cvid=?',[$cust_iid_del,$cvr_id_del]);

            return "delete_done";        
    }

    public function pay_data(request $request){

            $amt_pay=$request->cvr_price_upd;
            $pay_cust_iid=$request->pay_custid;
            $pay_cvid=$request->pay_cvid;
        
            $api=new Api(env('key_id'),env('key_secret'));
            $order=$api->order->create(array('receipt'=>'123','amount'=> $amt_pay*100,'currency'=>'INR'));
            $orderId=$order['id'];

            session()->put('orderId',$orderId);
            session()->put('amount',$amt_pay);

            DB::insert('insert into payment(pay_amount,order_id,pay_cid,pay_cvid) values(?,?,?,?)',[$amt_pay,$orderId,$pay_cust_iid,$pay_cvid]);

            return view('razorpay');
                
    }

    public function pay_success_data(request $request){
        
        $data=$request->all();

        $paym_id=strval($request->razorpay_payment_id);
        
        DB::update('update payment set  pay_status=? where order_id=? ',["yes",$request->razorpay_order_id]);

        // session()->put('pay_success_alert','payment_success');

        
        $mail_pay=DB::select('select * from payment where order_id=? ',[$request->razorpay_order_id]);

        foreach($mail_pay as $mail_pay){
            $mail_cid=$mail_pay->pay_cid;
            $mail_cvid=$mail_pay->pay_cvid;
            $mail_payamt=$mail_pay->pay_amount;
        }

        $mail_cust=DB::select('select * from customer where cust_id=? ',[$mail_cid]);

        foreach($mail_cust as $mail_cust){
            $m_custfname=$mail_cust->cust_firstname;
            $m_custmname=$mail_cust->cust_middlename;
            $m_custlname=$mail_cust->cust_lastname;
            $m_cust_email=$mail_cust->cust_email;

        }

        $mail_cv_details=DB::select('select * from sub_scheme_covers where cv_id=? ',[$mail_cvid]);

        foreach($mail_cv_details as $mail_cv_details){
            $mail_cv_name=$mail_cv_details->cv_name;
            $mail_cv_cover=$mail_cv_details->cv_amount;
            $mail_cv_price=$mail_cv_details->cv_price;
            
        }

        $mail_nom=$mail_payamt/$mail_cv_price;

        $details=[
            'name'=>$m_custfname .' '.$m_custmname .' '.$m_custlname,
            'title'=>'Payment Successfull',
            'body'=>'Congratulations!! You have successfully applied for insurance.',
            'body1'=>'Payment details',
            'body2'=>'Customer Id:-'. $mail_cid,
            'body3'=>'Insurance Name:-'. $mail_cv_name,
            'body4'=>'Insurance Cover:-'. $mail_cv_cover,
            'body5'=>'Insurance price per year:-'. $mail_cv_price,
            'body6'=>'No of people:-'. $mail_nom,
            'body7'=>'Your Bill Amount:-'. $mail_payamt,
            'body8'=>'Order Id:-'. $request->razorpay_order_id

        ];

        Mail::to($m_cust_email)->send(new paysuccess_mail($details)); 
     
        
        return view('insurances_all');



    }

    
}
