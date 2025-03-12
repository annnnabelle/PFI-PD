<?php

require "src/configuration.php";
require "src/functions.php";
require "src/routes.php";

routeToController(uriPath(), $routes);