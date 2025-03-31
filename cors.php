<?php

return [
    'paths' => ['api/*'],  // Aplicar solo a rutas que empiecen con /api
    'allowed_methods' => ['*'],  // Permitir todos los métodos (GET, POST, PUT, DELETE)
    'allowed_origins' => ['*'],  // Permitir solicitudes de cualquier origen
    'allowed_headers' => ['*'],  // Permitir cualquier header
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];

