<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Brand\BrandEnum;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\BrandStoreRequest;
use App\Http\Requests\Admin\Brand\BrandUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    private string $image_path = 'admin/brands';
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create-edit');
    }

    public function store(BrandStoreRequest $request)
    {
        if($this->brandControl(Str::slug($request->name)))
            return redirect()->back()->with('error', 'Bu isimde bir kategori zaten mevcut.');

        if (!$request->has('image'))
            return redirect()->back()->with('error', 'Kategori resmi eklemelisiniz.');

        $data = $request->except('_token');

        $userNameId = replaceTurkishCharacters(auth()->user()->name) . '-' . auth()->id();
        $imageHelper = new ImageHelper($this->image_path, $request->file('image'), $userNameId);
        $imagePath = $imageHelper->insertAndUpdateImage();
        $data['image'] = $imagePath;
        $data['status'] = isset($request->status) ? BrandEnum::STATUS_ACTIVE : BrandEnum::STATUS_INACTIVE;
        if(!$imagePath)
        {
            $imageHelper->deleteImage($imagePath);
            return redirect()->back()->with('error', 'Kategori oluşturulurken bir hata oluştu.');
        }

        $create = Brand::create($data);
        if(!$create)
        {
            $imageHelper->deleteImage($imagePath);
            return redirect()->back()->with('error', 'Kategori oluşturulurken bir hata oluştu.');
        }
        else
            return redirect()->back()->with('success', 'Kategori ekleme işlemi başarıyla gerçekleştirildi.');

    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.create-edit', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        if ($this->brandControl(Str::slug($request->name)) && $brand->slug != Str::slug($request->name))
            return redirect()->back()->with('error', 'Bu isimde bir kategori zaten mevcut.');
        $data = $request->except('_token');
        $data['status'] = isset($request->status) ? BrandEnum::STATUS_ACTIVE : BrandEnum::STATUS_INACTIVE;

        if ($request->has('image'))
        {
            $userNameId = replaceTurkishCharacters(auth()->user()->name) . '-' . auth()->id();
            $imageHelper = new ImageHelper($this->image_path, $request->file('image'), $userNameId);
            $imageHelper->deleteImage($brand->image);
            $imagePath = $imageHelper->insertAndUpdateImage();
            $data['image'] = $imagePath;
            if(!$imagePath)
            {
                $imageHelper->deleteImage($imagePath);
                return redirect()->back()->with('error', 'Kategori güncellenirken bir hata oluştu.');
            }
        }
        $update = $brand->update($data);
        if(!$update)
            return redirect()->back()->with('error', 'Kategori oluşturulurken bir hata oluştu.');
        else
            return redirect()->back()->with('success', 'Kategori ekleme işlemi başarıyla gerçekleştirildi.');


    }

    public function destroy(Brand $brand)
    {
        if (!$brand)
            return redirect()->back()->with('error', 'Kategori bulunamadı.');
        if ($brand->image)
            unlink(public_path($brand->image));
        $delete = $brand->delete();
        if (!$delete)
            return redirect()->back()->with('error', 'Kategori silinirken bir hata oluştu.');
        else
            return redirect()->back()->with('success', 'Kategori silme işlemi başarıyla gerçekleştirildi.');
    }
    private function brandControl($slug)
    {
        return Brand::where('slug', $slug)->first();

    }
}
