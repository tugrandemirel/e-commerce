<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Category\CategoryEnum;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private string $image_path = 'admin/categories';

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create-edit');
    }

    public function store(CategoryStoreRequest $request)
    {
        if($this->categoryControl(Str::slug($request->name)))
            return redirect()->back()->with('error', 'Bu isimde bir kategori zaten mevcut.');

        if (!$request->has('image'))
            return redirect()->back()->with('error', 'Kategori resmi eklemelisiniz.');

        $data = $request->except('_token');

        $userNameId = replaceTurkishCharacters(auth()->user()->name) . '-' . auth()->id();
        $imageHelper = new ImageHelper($this->image_path, $request->file('image'), $userNameId);
        $imagePath = $imageHelper->insertAndUpdateImage();
        $data['image'] = $imagePath;
        $data['status'] = isset($request->status) ? CategoryEnum::STATUS_ACTIVE : CategoryEnum::STATUS_INACTIVE;
        $data['parent_id'] = 0;
        if(!$imagePath)
        {
            $imageHelper->deleteImage($imagePath);
            return redirect()->back()->with('error', 'Kategori oluşturulurken bir hata oluştu.');
        }

       $create = Category::create($data);
       if(!$create)
       {
           $imageHelper->deleteImage($imagePath);
           return redirect()->back()->with('error', 'Kategori oluşturulurken bir hata oluştu.');
       }
       else
           return redirect()->back()->with('success', 'Kategori ekleme işlemi başarıyla gerçekleştirildi.');

    }

    public function edit(Category $category)
    {
        return view('admin.categories.create-edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        if ($this->categoryControl(Str::slug($request->name)) && $category->slug != Str::slug($request->name))
            return redirect()->back()->with('error', 'Bu isimde bir kategori zaten mevcut.');
        $data = $request->except('_token');
        $data['status'] = isset($request->status) ? CategoryEnum::STATUS_ACTIVE : CategoryEnum::STATUS_INACTIVE;
        $data['parent_id'] = 0;
        if ($request->has('image'))
        {
            $userNameId = replaceTurkishCharacters(auth()->user()->name) . '-' . auth()->id();
            $imageHelper = new ImageHelper($this->image_path, $request->file('image'), $userNameId);
            $imageHelper->deleteImage($category->image);
            $imagePath = $imageHelper->insertAndUpdateImage();
            $data['image'] = $imagePath;
            if(!$imagePath)
            {
                $imageHelper->deleteImage($imagePath);
                return redirect()->back()->with('error', 'Kategori güncellenirken bir hata oluştu.');
            }
        }
        $update = $category->update($data);
        if(!$update)
            return redirect()->back()->with('error', 'Kategori oluşturulurken bir hata oluştu.');
        else
            return redirect()->back()->with('success', 'Kategori ekleme işlemi başarıyla gerçekleştirildi.');


    }

    public function destroy(Category $category)
    {
        if (!$category)
            return redirect()->back()->with('error', 'Kategori bulunamadı.');
        if ($category->image)
            unlink(public_path($category->image));
        $delete = $category->delete();
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
