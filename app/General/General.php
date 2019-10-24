<?php

namespace App\General;

trait General
{
    public $data = [];

    public function data($key, $value = null)
    {
        return $this->data[$key] = $value;

    }

}