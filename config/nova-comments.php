<?php

return [

    // Sets whether or not Comments should show up in sidebar navigation.
    'available-for-navigation' => true,
    
    'globally-searchable' => true,

    // The resource to use as a commenter. Typically the User resource.
    'commenter' => [
        'nova-resource' => \App\Nova\User::class,
    ],

    // Configs for the comments panel
    'comments-panel' => [
        'name' => 'Comments',
    ],
    
    'comments-table' => 'comments',

    'comments-migrate' => false,

    // Maximum length of comment in comments panel
    'limit' => 100,

    'date-format' => 'MMM DD, YYYY',
];
