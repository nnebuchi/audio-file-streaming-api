<?php

if (!function_exists('generateOTP')) {
    /**
     * Undocumented function
     *
     * @param  int $length
     * @return void
     */
    function generateOTP()
    {   
        // Generates Random number between given pair
        return mt_rand(100000,999999);
    }
}
