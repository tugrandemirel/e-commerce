<?php

namespace App\Enum\Page;

enum PageEnum : int
{
    const PAGE_IS_ACTIVE = 1;
    const PAGE_IS_NOT_ACTIVE = 0;

    const PAGE_HEADER = 1;
    const PAGE_NOT_HEADER = 0;

    const PAGE_NAVBAR = 1;
    const PAGE_NOT_NAVBAR = 0;

    const PAGE_FOOTER = 1;
    const PAGE_NOT_FOOTER = 0;
}
