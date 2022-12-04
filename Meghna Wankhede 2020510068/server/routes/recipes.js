module.exports=function(modules)
{ 
    modules.app.post("/api/getrecipes",function(req,res){
      let ingredients = req.body.ingredients;

      var paramString = ingredients.join(',+');
      
      modules.services.recipes.getRecipes(paramString).then(function(data){
        res.status(200).send(JSON.stringify({status:true,data:data}));
      },function(err){  
        console.log(err);
        res.status(400).send(JSON.stringify({status:false,error:err.message}));
      }).catch(function(err){
        res.status(400).send(JSON.stringify({status:false,error:err.message}));
      })

    });

    modules.app.get("/api/getonerecipe/:id",function(req,res){
      let recipe_id = req.params.id;

      modules.services.recipes.getOneRecipe(recipe_id).then(function(data){
        res.status(200).send(JSON.stringify({status:true,data:data}));
      },function(err){  
        console.log(err);
        res.status(400).send(JSON.stringify({status:false,error:err.message}));
      }).catch(function(err){
        res.status(400).send(JSON.stringify({status:false,error:err.message}));
      })

    });

    modules.app.get("/api/get",function(req,res){
      const options = {
        url: `https://api.spoonacular.com/recipes/716429/information?apiKey=db0ed80b21ee40948f87c62bfa381051&includeNutrition=true`,
        json: true
      }

      modules.rp(options).then((data) => {
        let userData = [];
        modules.fs.writeFileSync("/docs/recipes.js", data);
        res.status(200).send(JSON.stringify({status:true,data:data}));
	    }).catch((err) => {
        console.log(err);
        res.status(400).send(JSON.stringify({status:false,error:err.message}));
      });
    })
}