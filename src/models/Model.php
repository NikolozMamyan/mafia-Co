<?php

namespace models;

abstract class Model
{
    public static function hydrate(array $data, string $className): object
    {
        $object = new $className();

        foreach ($data as $property => $value) {
            if (property_exists($className, $property)) {
                $object->$property = $value;
            }
        }

        return $object;
    }
}
