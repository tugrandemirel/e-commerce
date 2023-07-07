<?php

namespace App\Enum\Order;

enum OrderEnum : int
{
    // sipariş alındı
    case WAITING = 1;

    // kargoya çıktı
    case SHIPPED = 2;

    // urun teslim edildi
    case DELIVERED = 3;

    // urun iptal edildi
    case CANCELLED = 4;

    // urun geri gönderildi
    case RETURNED = 5;

    // urun musteri tarafından onaylandı
    case PAID = 6;
}
