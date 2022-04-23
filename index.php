<?php


require __DIR__.'/vendor/autoload.php';


use App\Router\Route;


Route::get('/', function(){
    Route::redirect('index');
});


Route::get('/sync', function(){
    header('Content-Type: application/json');
    echo '[';
    echo json_encode(['message1' => 'this is php']);
    echo ',';
    sleep(5);
    echo json_encode(['message2' => 'running in sync mode']);
    echo ']';
});