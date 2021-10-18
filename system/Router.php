<?php

class Router {

    # Route validation
    private static $valid_route = false;

    # Declared valid routes
    private static $routes = array();

    # Router class constructor
    public function __construct() {
        
    }

    # Set new route method
    public static function set($route, $controller) {
        # Checks if route already exists, display error
        # notice if true, and if false, then add route
        # in the declared reoutes
        if (!in_array($route, self::$routes)) {
            self::$routes[] = ['url' => $route, 'controller' => $controller];
        }
    }

    # Initialize router method
    public static function run() {
        # Get parsed url
        $parsed_url = (object) parse_url($_SERVER['REQUEST_URI']);
        # Loop declared routes
        foreach (self::$routes as $route) {
            # Convert array $routes to object
            $route = (object) $route;
            # Pattern
            $pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route->url)) . "$@D";
            # Patter matches
            $matches = array();
            # Checks route if valid
            if (preg_match($pattern, $parsed_url->path, $matches)) {
                # Delete first array
                array_shift($matches);
                # Parse the controller to get its method
                $parsed_data = explode('/', $route->controller);
                # Checks if controller has declared method,
                # set method 'index' as default if false, then
                # if true, get the declared method. lastly, set
                # the controller and method for the route
                if (count($parsed_data) > 0 && count($parsed_data) == 1) {
                    $_controller = $parsed_data[0];
                    $_method = 'index';
                } else {
                    $_controller = $parsed_data[0];
                    $_method = $parsed_data[1];
                }
                # Set the contoller and method for the route and
                # if there is a parameter in the route url, pass
                # pass the $params to the contoller method
                $_controller = new $_controller();
                $_controller->$_method(!empty($matches[0]) ? $matches[0] : '');
                # Set valid route to true
                self::$valid_route = true;
                # Break the foreach loop
                break;
            }
        }
        # Check route if valid, if not, diplay error notice
        if (!self::$valid_route) {
            echo 'Error : Invalid route.';
        }
    }

}