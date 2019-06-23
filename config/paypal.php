<?php
return array(
    // set your paypal credential
    'client_id' => 'ARLmjdo6feTtM9bREOEjzSkslO2ugRiJIG9v-Fl8AbjhqGR_4wqpm8TUTXKy-1d1D_w7e9Ve31j0TW4n',
    'secret' => 'EFjRvINaUilwaSmP9eUwvPru256GKY44QLYuvS5NozZ-ZApUU3ps62TJY1dASS1oVxk9Nm6L7vxAqPJU',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);