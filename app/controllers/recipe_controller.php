<?php

class RecipeController extends BaseController {

    public static function index() {

        $recipes = Resepti::all();
        View::make('recipe/index.html', array('recipes' => $recipes));
    }

    public static function images() {
        $recipes = Resepti::all();
        if (count($recipes) > 10) {
            array_slice($recipes, 10);
        }
        View::make('recipe/frontpage.html', array('recipes' => $recipes));
    }

    public static function show($id) {
        $recipe = Resepti::find($id);
        $ainesosat = Ainesosa::allRelatedToRecipe($id);
        View::make('recipe/show.html', array('recipe' => $recipe, 'ainesosat' => $ainesosat));
    }

    public static function create() {
        self::check_logged_in();
        $aineet = Raaka_aine::all();
        View::make('recipe/new.html', array('aineet' => $aineet));
    }

    public static function store() {
        self::check_logged_in();

        $params = $_POST;

        $attributes = array(
            'ruokalaji' => $params['ruokalaji'],
            'luokka' => $params['luokka'],
            'annosmaara' => $params['annosmaara'],
            'lahde' => $params['lahde'],
            'kuva' => $params['kuva'],
        );
        
        $ingredients = array(
            'maara' => $params['maara'],
            'raaka_aine' => $params['raaka_aine']
        );
        
        $aineet = Raaka_aine::all();
        
        $recipe = new Resepti($attributes);
        $errors = $recipe->errors();

        if (count($errors) == 0) {
            $recipe->save();
            RecipeIngredientController::store($recipe->id, $params['maara'], $params['raaka_aine']);

            Redirect::to('/recipe/' . $recipe->id, array('message' => 'Resepti on lisätty keittokirjaan.'));
        } else {
            View::make('recipe/new.html', array('errors' => $errors, 'attributes' => $attributes, 'ingredients' => $ingredients, 'aineet' => $aineet));
        }
    }

    public static function edit($id) {
        self::check_logged_in();

        $recipe = Resepti::find($id);
        $ainesosat = Ainesosa::allRelatedToRecipe($id);
        $aineet = Raaka_aine::all();
        View::make('recipe/edit.html', array('attributes' => $recipe, 'ainesosat' => $ainesosat, 'aineet' => $aineet));
    }

    public static function update($id) {
        self::check_logged_in();

        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'ruokalaji' => $params['ruokalaji'],
            'luokka' => $params['luokka'],
            'annosmaara' => $params['annosmaara'],
            'lahde' => $params['lahde'],
            'kuva' => $params['kuva']
        );

        $recipe = new Resepti($attributes);
        $errors = $recipe->errors();

        if (count($errors) > 0) {
            View::make('recipe/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $recipe->update();

            Redirect::to('/recipe/' . $recipe->id, array('message' => 'Reseptiä on muokattu onnistuneesti.'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();

        $recipe = new Resepti(array('id' => $id));
        $recipe->destroy();

        Redirect::to('/recipe', array('message' => 'Resepti on poistettu onnistuneesti.'));
    }

}
