<?php

namespace Paycard4jPhp\Utils;

use JsonException;

class JsonUtils
{
    // Private constructor to prevent instantiation
    private function __construct()
    {
    }

    /**
     * Converts JSON to an object of the specified class.
     *
     * @param string $json  The JSON to convert.
     * @param string $class The class to map the JSON to.
     * @return object An instance of the specified class with data from the JSON.
     * @throws JsonException if mapping the JSON to the object fails.
     */
    public static function getObjectFromJsonString(string $json, string $class): object
    {
        try {
            $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

            // Create an instance of the specified class and populate it with data
            return new $class(...$data);
        } catch (JsonException $e) {
            throw new JsonException("Error decoding JSON: " . $e->getMessage());
        }
    }
}

