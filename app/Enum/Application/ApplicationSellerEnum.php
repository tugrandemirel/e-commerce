<?php

namespace App\Enum\Application;

enum ApplicationSellerEnum : int
{
    case STATUS_PENDING = 0;
    case STATUS_APPROVED = 1;
    case STATUS_REJECTED = 2;
}
