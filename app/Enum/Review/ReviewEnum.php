<?php

namespace App\Enum\Review;

enum ReviewEnum : int
{
    const APPROVED_PASSIVE = 0;
    const APPROVED_ACTIVE = 1;

    const PUSHED_PASSIVE = 0;
    const PUSHED_ACTIVE = 1;
}
