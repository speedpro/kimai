<?php

/**
 * This file is part of
 * Kimai - Open Source Time Tracking // http://www.kimai.org
 * (c) Kimai-Development-Team since 2006
 *
 * Kimai is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; Version 3, 29 June 2007
 *
 * Kimai is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kimai; If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Class with helper functions for string handling
 */
class Kimai_Utility_StringUtility
{
    /**
     * Returns TRUE if $haystack begins with $needle.
     * The input string is not trimmed before and search is done case sensitive.
     *
     * @param string $haystack Full string to check
     * @param string $needle Reference string which must be found as the "first part" of the full string
     * @throws \InvalidArgumentException
     * @return bool TRUE if $needle was found to be equal to the first part of $haystack
     */
    public static function beginsWith($haystack, $needle)
    {
        // Sanitize $haystack and $needle
        if (is_object($haystack) || $haystack === null || (string)$haystack != $haystack) {
            throw new \InvalidArgumentException(
                '$haystack can not be interpreted as string',
                1347135546
            );
        }
        if (is_object($needle) || (string)$needle != $needle || strlen($needle) < 1) {
            throw new \InvalidArgumentException(
                '$needle can not be interpreted as string or has zero length',
                1347135547
            );
        }
        $haystack = (string)$haystack;
        $needle = (string)$needle;
        return $needle !== '' && strpos($haystack, $needle) === 0;
    }

    /**
     * Returns TRUE if $haystack ends with $needle.
     * The input string is not trimmed before and search is done case sensitive.
     *
     * @param string $haystack Full string to check
     * @param string $needle Reference string which must be found as the "last part" of the full string
     * @throws \InvalidArgumentException
     * @return bool TRUE if $needle was found to be equal to the last part of $haystack
     */
    public static function endsWith($haystack, $needle)
    {
        // Sanitize $haystack and $needle
        if (is_object($haystack) || $haystack === null || (string)$haystack != $haystack) {
            throw new \InvalidArgumentException(
                '$haystack can not be interpreted as string',
                1347135544
            );
        }
        if (is_object($needle) || (string)$needle != $needle || strlen($needle) < 1) {
            throw new \InvalidArgumentException(
                '$needle can not be interpreted as string or has no length',
                1347135545
            );
        }
        $haystackLength = strlen($haystack);
        $needleLength = strlen($needle);
        if (!$haystackLength || $needleLength > $haystackLength) {
            return false;
        }
        $position = strrpos((string)$haystack, (string)$needle);
        return $position !== false && $position === $haystackLength - $needleLength;
    }

    /**
     * This function generates a unique id by using the more entropy parameter.
     * Furthermore the dots are removed so the id can be used inside HTML attributes e.g. id.
     *
     * @param string $prefix
     * @return string
     */
    public static function getUniqueId($prefix = '')
    {
        $uniqueId = uniqid($prefix, true);
        return str_replace('.', '', $uniqueId);
    }
}
