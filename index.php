<?php

# Page start load timme
$start_load_time = microtime(TRUE);

# -----------------------------------------------------
# AUTOLOAD CLASSES
# -----------------------------------------------------
# Autoload system and controller classes 
spl_autoload_register(function($classes) {
    # Check if system class file does exists
    if (file_exists('system/' . $classes . '.php')) {
        # Include system class file
        require_once 'system/' . $classes . '.php';
    }
    # Check if controller class file does exists
    if (file_exists('application/controllers/' . $classes . '.php')) {
        # Include controller class file
        require_once 'application/controllers/' . $classes . '.php';
    }

    # Check if model class file does exists
    if (file_exists('application/models/' . $classes . '.php')) {
        # Include model class file
        require_once 'application/models/' . $classes . '.php';
    }
});
# -----------------------------------------------------

# -----------------------------------------------------
# DATABASE
# -----------------------------------------------------
# Initialize database sigleton class
$database = Database::getInstance();
# Get database connection
$db = $database->getConnection();
# -----------------------------------------------------

# -----------------------------------------------------
# ROUTER
# -----------------------------------------------------
# Include routes config
require_once 'application/config/routes.php';
# -----------------------------------------------------

# -----------------------------------------------------
# COMPOSER
# -----------------------------------------------------
# Composer autoload
require_once 'vendor/autoload.php';
# -----------------------------------------------------

# Page end load time
$end_load_time = microtime(TRUE);

# Display page load time
printf('<br><br>-<br>-<br>Page loaded in <strong>%f</strong> seconds.', $end_load_time - $start_load_time);