module.exports=function(modules){ 
    return { 
        login: require('./services/loginService')(modules),
        ingredients: require('./services/ingredientService')(modules),
        recipes: require('./services/recipeService')(modules),
    }
}