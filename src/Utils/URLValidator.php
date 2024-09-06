<?php

namespace Paycard4jPhp\Utils;

class URLValidator
{
    // Regular expression pattern for URL validation
    private const URL_REGEX = '/^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)$/';

    // Private constructor to prevent instantiation
    private function __construct()
    {
    }

    /**
     * Validates if the given URL is valid.
     *
     * @param string $url The URL to validate.
     * @return bool True if the URL is valid, false otherwise.
     */
    public static function isValid(string $url): bool
    {
        return preg_match(self::URL_REGEX, $url) === 1;
    }
}

