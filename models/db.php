<?php
/*
class  DB {
    private static  $db;

    public static function getDB(){
        if (self::$db === null){
            self::$db = self::connection();
        }

        return self::$db;
    }

    protected static function connection()
    {

    }
}