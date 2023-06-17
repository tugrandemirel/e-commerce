<?php

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

if (!   function_exists('changingDateTimeFormat'))
{
    function changingDateTimeFormat($date)
    {
        return  date('d-m-Y H:i:s', strtotime($date));
    }
}

if(! function_exists('yearCalculation'))
{
    // $date = 2021-01-01 00:00:00
    // $now = 2023-01-01 00:00:00
    // return 2 Yıl
    function yearCalculation($date)
    {
        if($date->diffInDays() > 365)
            return $date->diffInYears().' Yıl';
        elseif($date->diffInDays() > 30)
            return $date->diffInMonths().' Ay';
        else
            return $date->diffInDays().' Gün';

    }
}
