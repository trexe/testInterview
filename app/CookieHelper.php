<?php

namespace app;

class CookieHelper
{
    public static function checkCookie($key): bool
    {
        return !empty($_COOKIE[$key]) ? true : false;
    }
}
