<?php

$fdf_params = require __DIR__ . '/fdf_params.php';

return [
    'adminEmail'  => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName'  => 'Example.com mailer',
    'fdf_params'  => $fdf_params
];
