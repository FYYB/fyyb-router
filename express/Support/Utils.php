<?php

declare(strict_types=1);

namespace Fyyb\Support;

/**
 * @author Joao Netto <https://github.com/jnetto23>
 * @package Fyyb\express
 */
class Utils
{
    /**
     * clear URI
     *
     * @param String $uri
     * @return String
     */
    public static function clearURI(String $uri): String
    {
        for ($i = 0; $i < substr_count($uri, '/'); $i++) {
            $uri = str_replace('//', '/', $uri);
        };

        if (strlen($uri) > 1) {
            if (substr($uri, -1) === '/') {
                $uri = substr($uri, 0, -1);
            }
        }

        return $uri;
    }

    /**
     * Convert Data to Array
     *
     * @param [Array|stdClass] $data
     * @return array
     */
    public static function convertDataToArray($data): array
    {
        $formatedData = [];

        if ($data) {
            foreach ($data as $key => $value) {
                if (gettype($value) === 'object') {
                    $formatedData[$key] = self::convertDataToArray($value);
                } else {
                    $formatedData[$key] = $value;
                }
            }
        }

        return $formatedData;
    }
}