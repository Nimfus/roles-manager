<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Replace a User's model path if you use another path
    | for storing User model
    |
    |
    */

    'models' => [
      'user' => App\User::class,
      'role' => Nimfus\RolesManager\Models\Role::class
    ],
];