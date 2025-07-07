<?php

function redirect(string $path):void
{
    echo "page not found";
    //header("Location:/$path");
}

function dd(mixed $data, bool $top = false):void
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if($stop);
    die();
}