<?php

//Reseptin reitit

$routes->get('/', function() {
    RecipeController::images();
});

$routes->get('/recipe', function() {
    RecipeController::index();
});

$routes->post('/recipe', function() {
    RecipeController::store();
});
$routes->get('/recipe/new', function() {
    RecipeController::create();
});

$routes->get('/recipe/:id', function($id) {
    RecipeController::show($id);
});

$routes->get('/recipe/:id/edit', function($id){
    RecipeController::edit($id);
});

$routes->post('/recipe/:id/edit', function($id){
    RecipeController::update($id); 
});

$routes->post('/recipe/:id/destroy', function($id){
    RecipeController::destroy($id); 
});


// Raaka-aineen reitit

$routes->get('/ingredient', function() {
    IngredientController::index();
});

$routes->post('/ingredient', function() {
    IngredientController::store();
});

$routes->get('/ingredient/new', function() {
    IngredientController::create();
});

$routes->get('/ingredient/:nimi', function($nimi) {
    IngredientController::show($nimi);
});

$routes->get('/ingredient/:nimi/edit', function($nimi){
    IngredientController::edit($nimi); 
});

$routes->post('/ingredient/:nimi/edit', function($nimi){
    IngredientController::update($nimi); 
});

$routes->post('/ingredient/:nimi/destroy', function($nimi){
    IngredientController::destroy($nimi);
});

// Kirjautumisreitit

$routes->get('/login', function(){
    UserController::login();
});

$routes->post('/login', function(){
    UserController::handle_login();
});

$routes->post('/logout', function(){
    UserController::logout();
});

// Ainesosan reitit

$routes->get('/recipe/:id/recipe_ingredient', function($id){
    RecipeIngredientController::create($id);
});

$routes->post('/recipe/:id/recipe_ingredient', function($id){
    RecipeIngredientController::storeNew($id);
});


// Haun reitit

$routes->post('/search', function() {
    SearchController::results();
});

// HelloWorld -reitit

$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/recipe/1/edit', function() {
    HelloWorldController::recipe_edit();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});



