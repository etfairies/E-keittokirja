<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/recipe', function() {
  HelloWorldController::recipe_list();
  });
  
  $routes->get('/recipe/1', function() {
  HelloWorldController::recipe_show();
  });
  
  $routes->get('/recipe/1/edit', function() {
  HelloWorldController::recipe_edit();
  });
  
  $routes->get('/login', function() {
  HelloWorldController::login();
  });
  
