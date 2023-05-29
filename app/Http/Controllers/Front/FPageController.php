<?php

namespace App\Http\Controllers\Front;

use App\Enum\Page\PageEnum;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class FPageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)
                ->where('is_active', PageEnum::PAGE_IS_ACTIVE)
                ->firstOrFail();
        return view('front.page.index', compact('page'));
    }
}
