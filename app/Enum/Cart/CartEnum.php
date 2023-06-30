<?php

namespace App\Enum\Cart;

enum CartEnum :int
{
    case STATUS_PENDING = 0;
    case STATUS_APPROVED = 1;
    case STATUS_CANCELLED = 2;

}
