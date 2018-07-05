<?php

return [


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

	// 'defaults' => [
    //     'guard' => env('AUTH_GUARD', 'api'),
    // ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

		'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],


    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => BDO\User::class,
        ],
		// 'providers' => [
	    //     'users' => [
	    //         'driver' => 'eloquent',
	    //         'model' => App\Infrastructure\Eloquent\Candidate\Candidate::class
	    //     ]
	    // ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
