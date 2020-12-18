<?php

namespace xiaodi\CarFriend;

class CarFriend
{
    const API_HOST = 'https://testopen.cheyoudaren.com';

    public static function __callStatic($name, $arguments)
    {
        $class = '\\xiaodi\\CarFriend\\Service\\' . $name;

        
        return new $class(...$arguments);
    }
}
