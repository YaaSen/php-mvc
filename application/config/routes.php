<?php

# Default route for home page
Router::set('/', 'home');

# Additional routes
Router::set('app/cms/:any', 'admin/login');
Router::set('app/admin/dashboard', 'admin');

# Initialize router
Router::run();