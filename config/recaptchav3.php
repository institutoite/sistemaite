<?php

return [
    'site_key' => env('RECAPTCHA_SITE_KEY'),
    'secret_key' => env('RECAPTCHA_SECRET_KEY'),
    
    // Define las acciones y sus umbrales de puntaje
    'actions' => [
        'submit_form' => 0.5, // Acción 'submit_form' con un umbral de confianza de 0.5
    ],
];

// return [
//     'origin' => env('RECAPTCHAV3_ORIGIN', 'https://www.google.com/recaptcha'),
//     'sitekey' => env('RECAPTCHAV3_SITEKEY', ''),
//     'secret' => env('RECAPTCHAV3_SECRET', ''),
//     'locale' => env('RECAPTCHAV3_LOCALE', '')
// ];
