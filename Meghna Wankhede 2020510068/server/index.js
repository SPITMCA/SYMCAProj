var modules=require("./modules");
modules.services=require('./services')(modules);
module.routes=require('./routes')(modules);
modules.server.listen(modules.config.server_port,function(){
    console.log("Server Started");
});