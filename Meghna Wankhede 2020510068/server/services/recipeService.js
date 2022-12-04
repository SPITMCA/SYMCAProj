module.exports=function(modules) { 
    return {
        getRecipes:function (ingredients) {
          return new Promise((resolve,reject) => { 
            // const options = {
            //   url: `https://api.spoonacular.com/recipes/716429/information?apiKey=db0ed80b21ee40948f87c62bfa381051&ngredients=${ingredients}`,
            //   json: true
            // }
      
            // modules.rp(options).then((data) => {
            //   let userData = [];
            //   modules.fs.writeFileSync("/docs/recipes.js", data);
            //   resolve(data);
            // }).catch((err) => {
            //   console.log(err);
            //   reject(err);
            // });
            const options = {
              url: `https://api.spoonacular.com/recipes/findByIngredients?ingredients=${ingredients}&number=12`,
              headers: {'x-api-key': 'db0ed80b21ee40948f87c62bfa381051'}
            }

            function callback(error, response, body) {
              if (!error && response.statusCode == 200) {
                const info = JSON.parse(body);
                modules.fs.writeFileSync("rec.txt", body);
                resolve(info);
              } else { 
                console.log(error);
                reject(error);
              }
            }

            modules.request(options, callback);
            // modules.db.collection('recipes').find({"ingredients.ingredient_name": {$all: ingredients}}).toArray(function(err,rows){ 
            //   if(err) { 
            //     console.log(err)
            //     reject(err);
            //   } else { 
            //     console.log(rows)
            //     resolve(rows);
            //   }
            // })
          }) 
        },
        getOneRecipe:function (id) {
          return new Promise((resolve,reject) => { 
            const options = {
              url: `https://api.spoonacular.com/recipes/${id}/information`,
              headers: {'x-api-key': 'db0ed80b21ee40948f87c62bfa381051'}
            }

            function callback(error, response, body) {
              if (!error && response.statusCode == 200) {
                const info = JSON.parse(body);
                resolve(info);
              } else { 
                reject(error);
              }
            }

            modules.request(options, callback);
          })
        },
    }
}