<?php

class RecipeController extends BaseController {

    public static function index() {
        $recipes = Resepti::all();
        View::make('recipe/index.html', array('recipes' => $recipes));
    }

    public static function show($id) {
        $recipe = Resepti::find($id);
        View::make('recipe/show.html', array('recipe' => $recipe));
    }

    public static function create() {
        self::check_logged_in();

        View::make('recipe/new.html');
    }

    public static function store() {
        self::check_logged_in();

        $params = $_POST;

        $attributes = array(
            'ruokalaji' => $params['ruokalaji'],
            'luokka' => $params['luokka'],
            'annosmaara' => $params['annosmaara'],
            'lahde' => $params['lahde'],
            'kuva' => $params['kuva']
        );

        $recipe = new Resepti($attributes);
        $errors = $recipe->errors();

        if (count($errors) == 0) {
            $recipe->save();
            Redirect::to('/recipe/' . $recipe->id, array('message' => 'Resepti on lisätty keittokirjaan.'));
        } else {
            View::make('recipe/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function edit($id) {
        self::check_logged_in();

        $recipe = Resepti::find($id);
        View::make('recipe/edit.html', array('attributes' => $recipe));
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
