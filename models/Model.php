<?php

namespace models;

abstract class Model
{
    protected $data = [];

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = $value ?? null;
        }
    }
}
