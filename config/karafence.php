<?php

return [

    'name' => env('KARAFENCE_NAME', 'Karafence Academy'),

    'admin_email' => env('MAIL_ADMIN_ADDRESS', env('MAIL_FROM_ADDRESS', 'sensei@karafence.com')),

    'phone' => env('KARAFENCE_PHONE', '+91 63173 0172'),

    'phone_link' => env('KARAFENCE_PHONE_LINK', '+91631730172'),

    'email' => env('KARAFENCE_EMAIL', 'info@karafence.com'),

    'website' => env('APP_URL', 'http://localhost'),

    'locations' => [
        [
            'name' => 'Jatra Suru Sangha',
            'address' => 'Baishnabghata Patuli TWP, Karafence Academy Dojo',
            'hours' => 'Mon & Wed: 5:00 PM - 6:30 PM',
            'map_query' => 'Baishnabghata Yatra Shuru Sangha Kolkata',
        ],
        [
            'name' => 'Arunachal Sangha',
            'address' => 'Baghajatin, Karafence Academy Dojo',
            'hours' => 'Tue & Thu: 7:00 PM - 9:00 PM',
            'map_query' => 'Arunachal Sangha Kolkata',
        ],
    ],

    'whatsapp_number' => env('WHATSAPP_NUMBER', '91631730172'),

    'whatsapp_message' => env('WHATSAPP_MESSAGE', 'Hello Karafence Academy! I would like to get in touch.'),

    'social' => [
        'facebook' => env('KARAFENCE_FACEBOOK_URL', '#'),
        'instagram' => env('KARAFENCE_INSTAGRAM_URL', '#'),
        'youtube' => env('KARAFENCE_YOUTUBE_URL', '#'),
    ],

];
