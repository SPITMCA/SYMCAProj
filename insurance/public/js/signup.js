
console.log("signupscript");


          $(document).ready(function () {
            
            

            //console.log("jqery_runmm!!");
            $("#form_r").on('submit', function (event) {

              var val=0;

              event.preventDefault();

              

              var regName =  /^[a-zA-Z]+$/;
              var regmbno = /^[0-9]{1,10}$/;
              var regem = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
              var regpass=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
              

              if(!regName.test(document.getElementById('fname').value)){
                swal("First Name", "Enter Valid First Name", "error");
                val=1;
              }
               else if(!regName.test(document.getElementById('mname').value)){
                swal("Middle Name", "Enter Valid Middle Name", "error");
                val=1;
              }
               else if(!regName.test(document.getElementById('lname').value)){
                swal("Last Name", "Enter Valid Last Name", "error");
                val=1;
              }
              else if(!regem.test(document.getElementById('email').value)){
                swal("Email", "Enter Valid Email address", "error");
                val=1;
              }
              else if(!regmbno.test(document.getElementById('mbno').value)){
                swal("Mobile Number", "Enter Valid Mobile Number", "error");
                val=1;
              }
              else if(!regpass.test(document.getElementById('pass').value) ){
                swal("Password", "Must contain minimum eight characters, at least one letter, one number and one special character:", "error");
                val=1;
              }
              else if(document.getElementById('pass').value != document.getElementById('cnfpass').value){
                swal("Confirm Password", "Password & Confirm Password does not  match", "error");
                val=1;
              }
              else{
                val=0;
              }
            

              if(val==0){
                
              $("#cover-spin").show();

              //console.log("preventdef");
              var f = $(this).serialize();
              console.log(f);
              
              
              $.ajax({
                url: "/registration",
                data: f,
                type: 'POST',

                success: function (data) {
                  
                $("#cover-spin").hide();
                  console.log(data);
                  
                  swal(" Registered!!", "You successfully registered!", "success");
                },
                error: function (e) {
                  
                  $("#cover-spin").hide();
                  console.log(e.status);
                        if(e.status==500){ 
                   swal(" Oppss!!!", "Username already exist's", "error");
                  }
                  else{
                   swal(" Oppss!!!", "Something went wrong", "error");
                  }
                }
              })
            }

            })
          })
       