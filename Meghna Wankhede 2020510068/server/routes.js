module.exports=function(modules){ 
    require('./routes/login')(modules);
    require('./routes/ingredients')(modules);
    require('./routes/recipes')(modules);
}