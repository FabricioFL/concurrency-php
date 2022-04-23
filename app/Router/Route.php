<?php


namespace App\Router;


class Route
{
    public static function get(string $url, callable $action) : void
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == $url && is_array($action) == false)
        {
            echo $action();
        }
        if($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == $url && is_array($action) == true)
        {
            echo json_encode($action());
        }
    }

    public static function redirect(string $view) : void
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            header('Location: ../../resources/view/'.$view.'.html');
        }
    }
}