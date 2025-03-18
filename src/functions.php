<?php 
function isAuthenticated(): bool
{

    return !empty($_SESSION['user']);

}


function sessionStart(): void
{

    if (session_status() === PHP_SESSION_NONE) {

        session_start();
    }

}

function sessionDestroy(): void
{

    $_SESSION = [];
    session_destroy();

    $name = session_name();

}
