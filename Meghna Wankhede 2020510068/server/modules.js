var modules={ 
    express: require('express'),
    http: require('http'),
    moment: require('moment'),
    bodyParser: require('body-parser'),
    request: require('request'),
    fs: require('fs'),
    cors: require('cors'),
    mongodb: require('mongodb'),
    mongo: require('mongodb').MongoClient,
    objectid: require('mongodb').ObjectID,
    rp: require('request-promise'),
    recipeScrape: require("recipe-scraper"),
};

modules.config=require('./config');

modules.mongo.connect(modules.config.mongodbConfig.url,{ useNewUrlParser: true },function(err,client){
    if(!err){
      modules.db=client.db(modules.config.mongodbConfig.dbname);
    //   modules.grid_server=modules.grid(modules.db,modules.mongodb);
    }
    else{
      console.log(err)
    }
})

modules.app=modules.express();

modules.app.use(modules.bodyParser.json({limit:'50mb'}));

// modules.app=modules.express();

modules.app.use(modules.cors());

modules.app.use(function(req,res,next){
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    res.removeHeader('X-Powered-By');
    if(req.body.id)
    {
        req.body=JSON.parse(modules.crypto.dec(req.body.id.toString(),modules.config.salt));
    }
    next();
})

modules.server=modules.http.createServer(modules.app);

module.exports=modules;