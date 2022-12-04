module.exports=function(modules)
{ 
    modules.app.post("/login",function(req,res){
      if(_validate(req.body)){
        modules.services.login.login(req.body).then(function(data){
          res.status(200).send(JSON.stringify({status:true,data:data}));
        },function(err){  
          console.log(err)
          res.status(400).send(JSON.stringify({status:false,error:err.message}));
        }).catch(function(err){
          res.status(400).send(JSON.stringify({status:false,error:err.message}));
        })
      }
      else {
        res.status(200).send(JSON.stringify({status:false,error:error}));
      }
    });

    modules.app.post("/register", function(req, res) { 
      modules.services.login.signUp(req.body).then(function(data){
        res.status(200).send(JSON.stringify({status:true,data:data}));
      },function(err){  
        console.log(err)
        res.status(400).send(JSON.stringify({status:false,error:err.message}));
      }).catch(function(err){
        res.status(400).send(JSON.stringify({status:false,error:err.message}));
      })
    })

    modules.app.get("/test", function(req,res){ 
        modules.db.collection('users').find({username:"kailasr"}).toArray(function(err,rows){ 
            console.log(err);
            res.send("res", rows)
        })
    })
}
function _validate(data)
{
  if(!data.hasOwnProperty('email'))
  {
    error="Email Required";
    return false;
  }
  if(!data.hasOwnProperty('password'))
  {
    error="Password Required";
    return false;
  }
  return true;
}