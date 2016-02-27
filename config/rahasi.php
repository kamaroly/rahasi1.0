<?php

return [

    /*
    |--------------------------------------------------------------------------
    | External services connect timeout
    |--------------------------------------------------------------------------
    |
    | Float describing the number of seconds to wait while trying to connect 
    | to a server.Use 0 to wait indefinitely (the default behavior).
    |
    */
    
    'connect_timeout' =>5,
    /*
    |--------------------------------------------------------------------------
    | Merchant default service fee
    |--------------------------------------------------------------------------
    |
    | Integer describing the percantage of transacted fees to be charged 
    | when a merchant is paid using rahasi platform services.
    |
    */
    
    'appname'         => 'Rahasi',
    'service_fees'    => 5,
    
    'per_page'        => 20,
];
