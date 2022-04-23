<?php


require __DIR__.'/vendor/autoload.php';


use App\Event\EventLoop;
use App\Router\Route;


//use sync data
Route::get('/', function(){
    Route::redirect('index');
});


//use async data
Route::get('/async', function(){
    Route::redirect('async');
});


//provide sync data
Route::get('/sync', function(){
    foreach(range(1, 20) as $value)
    {
        echo '<div style="background-color: black; color: white; padding: 3rem; margin: 1rem; width: 5rem; border-radius: 2rem;">
        <a>'.$value.'</a>
        </div>';
    }
    foreach(range(1, 10) as $value)
    {
        echo '<div style="background-color: black; color: white; padding: 3rem; margin: 1rem; width: 5rem; border-radius: 2rem;">
        <a>'.$value.'</a>
        </div>';
    }
});


//provide async data
Route::get('/asyncsample', function(){
    $loop = new EventLoop();
    $loop->define(function() use ($loop){
        foreach(range(1, 20) as $value)
        {
            echo '<div style="background-color: black; color: white; padding: 3rem; margin: 1rem; width: 5rem; border-radius: 2rem;">
            <a>'.$value.'</a>
            </div>';
            $loop->next();
        }
    });

    $loop->define(function() use ($loop){
        foreach(range(1, 10) as $value)
        {
            echo '<div style="background-color: black; color: white; padding: 3rem; margin: 1rem; width: 5rem; border-radius: 2rem;">
            <a>'.$value.'</a>
            </div>';
            $loop->next();
        }
    });

    $loop->run();
});