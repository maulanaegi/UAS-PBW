<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | These are the paths where the view files are stored. Laravel will search
    | for views in these directories when rendering views. You can add more
    | directories to this array as needed.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This is the path where all of the compiled Blade views will be stored.
    | Typically, this is within the storage directory, but you are free to
    | change this path if you wish. However, it's a good idea to keep it
    | within the storage directory for security reasons.
    |
    */

    'compiled' => realpath(storage_path('framework/views')),

];
