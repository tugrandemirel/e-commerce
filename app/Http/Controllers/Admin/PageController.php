<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Page\PageEnum;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('order', 'desc')->get();
        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create-edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
        ]);
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['title']);
        $data['is_active'] = $request->has('is_active') ? PageEnum::PAGE_IS_ACTIVE : PageEnum::PAGE_IS_NOT_ACTIVE;
        $data['header'] = $request->has('header') == 'on' ? PageEnum::PAGE_HEADER : PageEnum::PAGE_NOT_HEADER;
        $data['footer'] = $request->has('footer') == 'on' ? PageEnum::PAGE_FOOTER : PageEnum::PAGE_NOT_FOOTER;
        $data['navbar'] = $request->has('navbar') == 'on' ? PageEnum::PAGE_NAVBAR : PageEnum::PAGE_NOT_NAVBAR;

        $pages = Page::create($data);
        if ($pages)
            return redirect()->route('admin.page.index')->with('success', 'Sayfa başarıyla eklendi.');
        else
            return redirect()->route('admin.page.index')->with('error', 'Sayfa eklenirken bir hata oluştu.');

    }

    public function edit(Page $page)
    {
        return view('admin.page.create-edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
        ]);
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['title']);
        $data['is_active'] = $request->has('is_active') ? PageEnum::PAGE_IS_ACTIVE : PageEnum::PAGE_IS_NOT_ACTIVE;
        $data['header'] = $request->has('header') == 'on' ? PageEnum::PAGE_HEADER : PageEnum::PAGE_NOT_HEADER;
        $data['footer'] = $request->has('footer') == 'on' ? PageEnum::PAGE_FOOTER : PageEnum::PAGE_NOT_FOOTER;
        $data['navbar'] = $request->has('navbar') == 'on' ? PageEnum::PAGE_NAVBAR : PageEnum::PAGE_NOT_NAVBAR;
        $update = $page->update($data);
        if ($update)
            return redirect()->route('admin.page.index')->with('success', 'Sayfa başarıyla güncellendi.');
        else
            return redirect()->route('admin.page.index')->with('error', 'Sayfa güncellenirken bir hata oluştu.');
    }

    public function destroy(Request $request)
    {
        $delete = Page::where('id', $request->id)->delete();
        if ($delete)
            return redirect()->route('admin.page.index')->with('success', 'Sayfa başarıyla silindi.');
        else
            return redirect()->route('admin.page.index')->with('error', 'Sayfa silinirken bir hata oluştu.');
    }

}
