<?php

namespace App\Enum\Order;

enum OrderEnum : int
{
    // sipariş alındı
    case WAITING = 1;

    // sipariş onaylandı
    case APPROVED = 2;

    // kargoya çıktı
    case SHIPPED = 3;

    // urun teslim edildi
    case DELIVERED = 4;

    // urun müşteri tarafından iptal edildi
    case CANCELLED = 5;

    // urun geri gönderildi
    case RETURNED = 6;

    // urun musteri tarafından onaylandı
    case PAID = 7;

    // urun satıcı tarafından red edildi
    case REJECTED = 8;
}
