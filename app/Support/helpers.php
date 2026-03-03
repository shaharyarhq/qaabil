<?php

if (! function_exists('app_date_format')) {
    function app_date_format()
    {
        return 'd-M-Y';
    }
}

if (! function_exists('app_date_time_format')) {
    function app_date_time_format()
    {
        return 'd-M-Y h:i a';
    }
}
