module.exports=function(modules) { 
    return {
        getIngredients:function () {
          return new Promise((resolve,reject) => { 
            modules.db.collection('ingredients').find().toArray(function(err,rows){ 
              if(err) { 
                reject(err);
              } else { 
                resolve(rows);
              }
            })
          }) 
        },
        
    }
}