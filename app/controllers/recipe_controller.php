<?php

class RecipeController extends BaseController{
    
    public static function index(){
        $recipes = Resepti::all();
        View::make('recipe/index.html', array('recipes' => $recipes));
    }
    
    public static function show($id){
        $recipe = Resepti::find($id);
        View::make('recipe/show.html', array('recipe' => $recipe));
    }
}
