<?php 

// Cette fonction détermine le contrôleur à appeler en fonction du chemin demandé et des routes définies
function routeToController($path, $routes) {

    if (array_key_exists($path, $routes) && file_exists($routes[$path])) {
       
        require $routes[$path];

    }
}

// Cette fonction récupère et retourne le chemin de l'URI demandé par l'utilisateur
function uriPath() : string{

    $url = $_SERVER['REQUEST_URI'];

    $urlParts = parse_url($url);
    
    return $urlParts['path'];

}

// Cette fonction permet de rediriger l'utilisateur vers un autre chemin ou une autre page
function redirect(string $path) : void 
{
    
    header('Location: ' . $path);
    exit;

}
