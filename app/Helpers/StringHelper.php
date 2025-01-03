<?php

if (! function_exists('replaceTurkishCharacters')) {
    // Türkçe karakterleri ingilizce karakterlere çevirir.
    function replaceTurkishCharacters($string, $whitespace = false)
    {
        $search = array('ç', 'Ç', 'ğ', 'Ğ', 'ı', 'İ', 'ö', 'Ö', 'ş', 'Ş', 'ü', 'Ü');
        $replace = array('c', 'C', 'g', 'G', 'i', 'I', 'o', 'O', 's', 'S', 'u', 'U');
        $string = str_replace($search, $replace, $string);
        if (!$whitespace)
            $string = str_replace(' ', '-', $string);
        return strtolower($string);
    }
}

if (! function_exists('explodeTags'))
{
    function explodeTags($tags)
    {
        $tags = explode(',', $tags);
        $tags = array_map('trim', $tags);
        return $tags;
    }
}
