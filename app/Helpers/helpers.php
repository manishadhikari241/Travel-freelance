<?php

function getConfiguration($key)
{
    $config = \App\Model\Configuration::where('configuration_key', '=', $key)->first();
    if ($config != null) {
        return $config->configuration_value;
    }
    return null;
}

