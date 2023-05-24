<?php

namespace App\Enum\Product;

enum ProductEnum : int
{
    // Müşteriye Göster Gösterme
    const VISIBILITY_ACTIVE = 1;
    const VISIBILITY_PASSIVE = 0;

    // Ürünü Öne Çıkar
    const PUSH_ON_ACTIVE = 1;
    const PUSH_ON_PASSIVE = 0;

    // Stokta ürün var yok
    const STOCK_ACTIVE = 1;
    const STOCK_PASSIVE = 0;

    // Ürün durumu. 0, ikinci el, Yenilenmiş.
    const STATUS_NEW = 0;
    const STATUS_SECONDHAND = 1;
    const STATUS_RENEWED = 2;

    // Admin tarafından onaylandı onaylanmadı tekrardan ona gönderildi

    const APPROVAL_PENDING = 0;
    const APPROVAL_APPROVED = 1;
    const APPROVAL_REJECTED = 2;
    const APPROVAL_RESEND = 3;

}
