module.exports=function(modules)
{ 
    modules.app.get("/api/getingredients",function(req,res){
        
        modules.services.ingredients.getIngredients().then(function(data){
          res.status(200).send(JSON.stringify({status:true,data:data}));
        },function(err){  
          console.log(err)
          res.status(400).send(JSON.stringify({status:false,error:err.message}));
        }).catch(function(err){
          res.status(400).send(JSON.stringify({status:false,error:err.message}));
        })

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

}