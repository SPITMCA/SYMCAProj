module.exports=function(modules) { 
    return {
        login:function (user) {
          return new Promise((resolve,reject) => { 
            modules.db.collection('users').find({username:user.username}).toArray(function(err,rows){ 
              if(err) { 
                reject(err);
              } else { 
                resolve(rows);
              }
            })
          }) 
        },
        signUp:function (user) {
          return new Promise((resolve,reject) => { 
            modules.db.collection('users').insertOne(user,function(err,res){
              if(err) { 
                reject(err);
              } else { 
                resolve(res);
              }
            })
          }) 
        }
    }
}