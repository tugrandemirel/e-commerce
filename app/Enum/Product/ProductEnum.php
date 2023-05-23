<?php

namespace App\Enum\Product;

enum ProductEnum : int
{
    const VISIBILITY_ACTIVE = 1;
    const VISIBILITY_PASSIVE = 0;

    const PUSH_ON_ACTIVE = 1;
    const PUSH_ON_PASSIVE = 0;

    const STOCK_ACTIVE = 1;
    const STOCK_PASSIVE = 0;
    const STATUS_NEW = 0;
    const STATUS_SECONDHAND = 1;
    const STATUS_RENEWED = 2;
}
