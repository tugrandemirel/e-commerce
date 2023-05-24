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

if (! function_exists('changingDateFormat')) {
    // 2021-01-01 -> 01-01-2021
    function changingDateFormat($date)
    {
        return  date('d-m-Y', strtotime($date));
    }
}

if (! function_exists('monthChangingDateFormat')) {
    // 2021-01-01 -> 1 Ocak 2021
    function monthChangingDateFormat($date)
    {
        $date = changingDateFormat($date);
        $date = explode('-', $date);
        $month = monthName($date[1]);
        return $date[0].' '.$month.' '.$date[2];
    }
}

if (! function_exists('monthName'))
{
    function monthName($month)
    {
        switch ($month) {
            case '01':
                return 'Ocak';
                break;
            case '02':
                return 'Şubat';
                break;
            case '03':
                return 'Mart';
                break;
            case '04':
                return 'Nisan';
                break;
            case '05':
                return 'Mayıs';
                break;
            case '06':
                return 'Haziran';
                break;
            case '07':
                return 'Temmuz';
                break;
            case '08':
                return 'Ağustos';
                break;
            case '09':
                return 'Eylül';
                break;
            case '10':
                return 'Ekim';
                break;
            case '11':
                return 'Kasım';
                break;
            case '12':
                return 'Aralık';
                break;
            default:
                return 'Hatalı ay';
                break;
        }
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

if (!   function_exists('changingDateTimeFormat'))
{
    function changingDateTimeFormat($date)
    {
        return  date('d-m-Y H:i:s', strtotime($date));
    }
}

