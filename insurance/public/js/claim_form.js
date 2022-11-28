document.getElementById('sub').setAttribute('disabled',true);



function otp_gen() {

    var otp_cid=document.getElementById('h_cust_id').value;
    if(otp_cid==""){
        swal("Invalid Customer ID", "Please enter valid customer ID before generating OTP", "error");
    }
    else{
        
    $("#cover-spin").show();
    var otp_cvname=document.getElementById('h_cust_cvname').value;
    
    $.ajax({
        url: '/otp_gen/'+otp_cid+'/'+otp_cvname,
        type: 'GET',
        data: {},
        
        success: function () {
          console.log('otp_generated');
          $("#cover-spin").hide();

          document.getElementById('sub').removeAttribute('disabled',true);

          swal("OTP sent Successfully", "OTP has been sent to the users  registered email address", "success");
        },
        error: function (e) {
            $("#cover-spin").hide();
            if(e.status==500){ 
                swal("Invalid User", " User has not opted for such scheme,Please check the scheme selected", "error");
               }
               else{
                    
                    swal(" Oppss!!!", "Something went wrong_tes", "error");
               }


        }
      })

    }


}

function doc_form(elm) {
    var no_doc=parseInt(elm.value);

    var result = document.querySelector('#doc_form_res');
    result.innerHTML = '';
    for (var i = 1; i <= parseInt(elm.value); i++) {
    var wrapper = document.createElement('div');
    wrapper.innerHTML = '<label>Document '+i+'</label> <label>Enter document name</label><input type="text"  class="form-control" id="hc_doc_name'+i+'" name="hc_doc_name'+i+'"> <label>Upload File</label><input type="file"  class="form-control" id="h_cust_doc'+i+'" name="h_cust_doc'+i+'">';
    result.appendChild(wrapper);

  }

}


function claim_form_js(ev,id_form) {
  console.log("cliam_form");
  ev.preventDefault();
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  var formData = new FormData(document.getElementById(id_form));

  console.log(formData);

  

  $.ajax({
    url: "/claim_submitted",
    data: formData,
    type: 'POST',
    cache: false,
    contentType: false,
    processData: false,

    success: function (data) {
      console.log("claim_success");
      swal("Claimed Successfully", "Congratulations your claim has been registered successfully", "success");
    },
    error:function(e){
        if(e.status==500){
          
          swal("Claim amount OutofRange", "your claim has surpassed the cover limit", "error");
        }
        
        if(e.status==401){
          
          swal("Invalid OTP", "Wrong OTP , Please generate new OTP and try again.", "error");
        }
    }
  })
}

