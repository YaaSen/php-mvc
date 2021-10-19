<?php

# Autoload system classes
spl_autoload_register(function($classes) {
    # Checks if class file does exists
    if (file_exists($classes . '.php')) {
        require_once $classes . '.php';
    }
});

# Autolaod controlller classes
spl_autoload_register(function($controllers) {
    if (file_exists('./application/controllers/' . $controllers . '.php')) {
        require_once './application/controllers/' . $controllers . '.php';
    }
});

# Load routes config file
require_once './application/config/routes.php';
# Initialize router
Router::run();
