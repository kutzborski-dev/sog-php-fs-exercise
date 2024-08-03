<?php

if(!function_exists('strToSlug')) {
    /**
     * Converts a string to a URL friendly slug.
     *
     * This function takes a string and replaces all spaces with hyphens,
     * then converts the entire string to lowercase to create a URL friendly slug.
     *
     * @param string $str The input string to be converted to a slug.
     * @return string The converted slug.
     */
    function strToSlug(string $str) {
        $str = str_ireplace(' ', '-', $str);
        return strtolower($str);
    }
}

if(!function_exists('slugToTitle')) {
    /**
     * Converts a URL friendly slug back to a title.
     *
     * This function takes a slug and converts it back to a human-readable title by replacing
     * hyphens with spaces and capitalizing the first letter of each word.
     *
     * @param string $slug The slug to be converted back to a title.
     * @return string The converted title.
     */
    function slugToTitle(string $slug) {
        $parts = explode('-', $slug);

        return implode(' ', array_map(fn($part) => ucfirst($part), $parts));
    }
}