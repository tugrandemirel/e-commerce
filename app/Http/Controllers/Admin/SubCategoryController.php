<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Category\CategoryEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Http\Requests\Admin\Category\SubCategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = Category::where('parent_id', '!=', 0)->orderBy('id', 'desc')->paginate(20);
        return view('admin.categories.sub-categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->orderBy('id', 'desc')->get();
        return view('admin.categories.sub-categories.create-edit', compact('categories'));
    }

    public function store(SubCategoryStoreRequest $request)
    {
        if($this->categoryControl(Str::slug($request->name)))
            return redirect()->back()->with('error', 'Bu isimde bir kategori zaten mevcut.');

        $data = $request->except('_token');
        $data['status'] = isset($request->status) ? CategoryEnum::STATUS_ACTIVE : CategoryEnum::STATUS_INACTIVE;

        $create = Category::create($data);
        if(!$create)
        {

            return redirect()->back()->with('error', 'Kategori oluşturulurken bir hata oluştu.');
        }
        else
            return redirect()->back()->with('success', 'Kategori ekleme işlemi başarıyla gerçekleştirildi.');

    }

    public function edit(Category $subCategory)
    {
        $categories = Category::all();
        return view('admin.categories.sub-categories.create-edit', compact('subCategory', 'categories'));
    }

    public function update(SubCategoryStoreRequest $request, Category $subCategory)
    {
        if ($this->categoryControl(Str::slug($request->name)) && $subCategory->slug != Str::slug($request->name))
            return redirect()->back()->with('error', 'Bu isimde bir kategori zaten mevcut.');

        $data = $request->except('_token');
        $data['status'] = isset($request->status) ? CategoryEnum::STATUS_ACTIVE : CategoryEnum::STATUS_INACTIVE;

        $update = $subCategory->update($data);
        if(!$update)
            return redirect()->back()->with('error', 'Kategori oluşturulurken bir hata oluştu.');
        else
            return redirect()->back()->with('success', 'Kategori ekleme işlemi başarıyla gerçekleştirildi.');


    }
    public function destroy(Category $subCategory)
    {
        if (!$subCategory)
            return redirect()->back()->with('error', 'Kategori bulunamadı.');

        $delete = $subCategory->delete();
        if (!$delete)
            return redirect()->back()->with('error', 'Kategori silinirken bir hata oluştu.');
        else
            return redirect()->back()->with('success', 'Kategori silme işlemi başarıyla gerçekleştirildi.');
    }
    private function categoryControl($slug)
    {
        return Category::where('slug', $slug)->first();
    }
}
