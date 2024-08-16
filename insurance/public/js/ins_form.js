
console.log("insform_script");


document.getElementById('sub').setAttribute('disabled',true);





   function doc_check_aj(ev,id_form) {
    ev.preventDefault();
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  
    var formData = new FormData(document.getElementById(id_form));

    console.log(formData);

    $("#cover-spin").show();

    $.ajax({
      url: "/doc_check",
      data: formData,
      type: 'POST',
      cache: false,
      contentType: false,
      processData: false,

      success: function (data) {

         var adharno =data.uadno;
         var filename=data.filename;
        var doc_main_uname =data.doc_main_uname;
        var doc_verified =data.doc_verified;
        var cvr_id_del=data.cvr_id;
        var cust_iid_del=data.cust_iid;
        var as_u=data.as_u;


        var ad_split = '';

        for (var i = 0; i < adharno.length; i++) {
          if (i != 0 && i % 4 == 0) {
            ad_split += ' ' + adharno.charAt(i);
          }
          else {
            ad_split = ad_split + adharno.charAt(i);
          }
        }


        Tesseract.recognize(
          'images/doc_check/' + filename,
          'eng',
          { logger: m => console.log(m) }
        ).then(({ data: { text } }) => {
          console.log(text);

          var tt = text;
          // if (tt.includes(ad_split) || tt.includes(doc_main_uname)) {
          if (tt.includes(ad_split) ) {
            console.log('tessract_succ');
            
                  
          $.ajax({
            url: "/data_upload",
            data: formData,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,

            success: function (data) {
                console.log("DATA_Uploaded");
                $("#cover-spin").hide();
                if(data=="main_user_err"){
                  swal("User Credentials !!", "Upload Main users data first!!", "error");
                }
                else{
                    
                   swal(" Verification Succesfull!!", "Your document has been verified successfully", "success");
                   document.getElementById(doc_verified).setAttribute("value","verified");

                   var pay_ver=document.getElementById('ins_nom').value;
                   var ver_check=0;
                   for(var pi=0; pi<=pay_ver; pi++){
                     if(document.getElementById('doc_ver'+pi).value!="verified"){
                       console.log("all_not_ver");
                       ver_check=1;
                       document.getElementById('sub').setAttribute('disabled',true);
                     }
                   }
                   if(ver_check==0){
                    document.getElementById('sub').removeAttribute('disabled',true);
                   }

                }
            },
            error: function (e) {
              console.log("DATA_error");
              console.log(JSON.stringify(e));
            }

          
          })
            
          
            $('#'+data.u_dform_id+' :input').prop('disabled', true); 
            // document.getElementById(data.clr_form_id).removeAttribute("disabled",true);
            document.getElementById('clr_form').removeAttribute("disabled",true);
            
            
            

          }
          else {

            $("#cover-spin").hide();

            $.ajax({
              url: '/doc_del/'+ cvr_id_del +'/'+ cust_iid_del +'/'+ as_u +'/'+doc_main_uname,
              type: 'GET',
              data: {},
              
              success: function () {
                console.log('filedeleted');
                swal("File Error!!", "File can't be verified please upload proper & scanned file", "error");
              },
              error: function (e) {

                swal(" Oppss!!!", "Something went wrong_tes", "error");

              }
            })

            console.log('tessract_failure');
          }
        })


         
      },
      error: function (e) {
        $("#cover-spin").hide();
        console.log(e);
        swal(" Oppss!!!", "Something went wrong_doc", "error");

      }
    })


  }







  // function clear_form(form_iid,veri_id,del_dataid,cvr_id_del,cust_iid_del,as_u,username_del) {
  //   $('#'+form_iid+' :input').prop('disabled', false);
  //   document.getElementById(del_dataid).setAttribute("disabled",true);
  //   document.getElementById(veri_id).setAttribute("value",veri_id);

  //   $.ajax({
  //     url: '/doc_del_btn/' + cvr_id_del +'/'+ cust_iid_del +'/'+as_u+'/'+username_del,
  //     type: 'GET',
  //     data: {},
      
  //     success: function () {
  //       console.log('filedeleted');
  //       swal("Delete data!!", "File deleted successfully", "success");
  //     },
  //     error: function (e) {

  //       swal(" Oppss!!!", "Something went wrong_tes", "error");

  //     }
  //   })


  // }

  function clear_form(cvr_id_del,cust_iid_del){
    console.log("clear_form_2");

    $.ajax({
           url: '/doc_del_btn/' + cvr_id_del +'/'+ cust_iid_del ,
           type: 'GET',
           data: {},
         
           success: function () {
             console.log('filedeleted');
             swal("Delete data!!", "File deleted successfully", "success");
             location.reload();
           },
           error: function (e) {
    
             swal(" Oppss!!!", "Something went wrong_tes", "error");
    
           }
         })
    
  }

function bnfch(checkbox) {
  console.log("bnfch");
  var acrd = document.getElementById('ins_ufile');
  var ins_uano = document.getElementById('ins_uano');
  var u_ver = document.getElementById('u_ver');


  if (checkbox.checked == true) {
    console.log("on");
    //$('#u_dform :input').prop('disabled', true);
    document.getElementById('benif_id').setAttribute("value","no");
    mem_form(document.getElementById('ins_nom'),document.getElementById('cvr_id').value,document.getElementById('cust_iid').value);

  }
  else {
    console.log("off");
    //$('#u_dform :input').prop('disabled', false); 
    document.getElementById('benif_id').setAttribute("value","yes");
    mem_form(document.getElementById('ins_nom'),document.getElementById('cvr_id').value,document.getElementById('cust_iid').value);
  }
}

function mname(elm) {
  var regName = /^[a-zA-Z" "]+$/;

  if (!regName.test(elm.value)) {
    swal("First Name", "Enter Valid Full Name", "error");
  }
}

function advalid(elm) {
// var adv = /^[0-9]{1,12}$/;
var adv =/^\d{12}$/;

  if(!adv.test(elm.value)){
      swal("Aadhar Number", "Enter Valid Aadhar Number", "error");
    }
}

function adfile_val(elm) {

  var path=elm.value;

  var basename = path.split(/[\\/]/).pop(),  // extract file name from full path ...
                                               // (supports `\\` and `/` separators)
        pos = basename.lastIndexOf(".");       // get last position of `.`

    if (basename === "" || pos < 1)            // if file name is empty or ...
        return "";                             //  `.` not found (-1) or comes first (0)

    var exten=basename.slice(pos + 1);

    console.log(exten);
    
    if(exten=="jpeg"||exten=="jpg"||exten=="png"){
      
    }
    else{
      swal("File Format", "Upload JPEG or PNG files", "error");
    }

}

function mem_form(elm,cvid,cust_iid) {
  var nomm=parseInt(elm.value);
  console.log(nomm);
  console.log(cvid);

  var result = document.querySelector('#mem_form_res');
  result.innerHTML = '';
  for (var i = 1; i <= parseInt(elm.value); i++) {
    var wrapper = document.createElement('div');
    var fid="'u_dform"+i+"'";
    var u_dform="'u_dform"+i+"'";
    var doc_ver="'doc_ver"+i+"'";
    var clr_form="'clr_form"+i+"'";
    var cvidd="'"+cvid+"'";
    var cust_iidd="'"+cust_iid+"'";
    var asmm="'asm'";
    var nameu="'Rajaram Ramachandram Mangalarapu'";
    var doc_main_uname_clr="doc_main_uname"+i;
    wrapper.innerHTML = '<label><b>Member ' + i + '</b></label><br> <form action="/doc_check" method="post"  id="u_dform'+i+'" class="u_dformc" enctype="multipart/form-data" onsubmit="doc_check_aj(event,'+fid+')"><input type="hidden"  class="form-control" id="u_dform_id'+i+'" name="u_dform_id" value="u_dform'+i+'"><label >Enter Name(format in aadhar card)</label> <input type="text" class="form-control" onblur="mname(this)"; id="doc_main_uname' + i + '" name="doc_main_uname" > </div> <div class="form-group"> <label>age</label> <input type="number" class="form-control" id="ins_uage' + i + '" name="ins_uage"><div class="form-group"><label>Enter Aadhar number</label><input type="number"  class="form-control" id="ins_uano' + i + '" name="ins_uano" onblur="advalid(this)"></div></div> <div class="form-group"> <label >Aadhar Card</label> <input type="file" class="form-control" id="ins_ufile' + i + '" name="ins_ufile" onblur="adfile_val(this)"> </div>  <input type="hidden"  class="form-control" id="doc_ver'+ i +'" name="doc_verified" value="doc_ver'+ i +'"><input type="hidden"  class="form-control" id="cvr_id'+ i +'" name="cvr_id" value="'+cvid+'"><input type="hidden"  class="form-control" id="cust_iid'+ i +'" name="cust_iid" value="'+cust_iid+'"><input type="hidden"  class="form-control" id="as_u'+ i +'" name="as_u" value="asm"> <button type="submit" id="u_ver'+i+'" name="u_ver" class="btn btn-warning">Verify Data</button><br></form><br>';
    result.appendChild(wrapper);

  }

                   var pay_ver=document.getElementById('ins_nom').value;
                   var ver_check=0;
                   for(var pi=0; pi<=pay_ver; pi++){
                     if(document.getElementById('doc_ver'+pi).value!="verified"){
                       console.log("all_not_ver");
                       ver_check=1;
                       document.getElementById('sub').setAttribute('disabled',true);
                     }
                   }
                   if(ver_check==0){
                    document.getElementById('sub').removeAttribute('disabled',true);
                   }


  var amount_cal;
  if(nomm==0 || elm.value==""){
    if(document.getElementById('bnf').checked==true){
      // document.getElementById('sub').setAttribute('disabled',true);
      amount_cal=0;
    }
    else{
      // document.getElementById('sub').removeAttribute('disabled',true);
      amount_cal=document.getElementById('cvr_price_id').value;  
    }
    
  }
  else{
    if(document.getElementById('bnf').checked==true){
      amount_cal=document.getElementById('cvr_price_id').value * nomm;
      // document.getElementById('sub').removeAttribute('disabled',true);
    }
    else{
    nommu=nomm+1;
    amount_cal=(document.getElementById('cvr_price_id').value * nommu) ; 
    // document.getElementById('sub').removeAttribute('disabled',true); 
    }
  }
  
  console.log(amount_cal);
  var bill_amt = document.querySelector('#bill_amt');
  // bill_amt.innerHTML='<label id="cvr_price"><i>Your Bill: </i><b><span>&#8377;</span> '+amount_cal+'</b></label>'
   bill_amt.innerHTML='<i>Your Bill: </i><b><span>&#8377;</span> '+amount_cal+'</b>';
   document.getElementById('cvr_price_upd').setAttribute("value",amount_cal);
  

}



