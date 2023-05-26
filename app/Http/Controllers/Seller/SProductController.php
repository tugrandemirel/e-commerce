<?php

namespace App\Http\Controllers\Seller;

use App\Enum\Brand\BrandEnum;
use App\Enum\Category\CategoryEnum;
use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SProductStoreRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class SProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('seller.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->where('status', CategoryEnum::STATUS_ACTIVE)->orderBy('name')->get();
        $brands = Brand::where('status', BrandEnum::STATUS_ACTIVE)->orderBy('name')->get();
        return view('seller.product.create-edit', compact('categories', 'brands'));
    }

    public function store(SProductStoreRequest $request)
    {
        $data = $request->except(['_token', 'document']);
        $sellerId = Seller::where('user_id', auth()->id())->first()->id;
        $data['seller_id'] = $sellerId;


        $data['visibility'] = $data['visibility'] == 1 ? ProductEnum::VISIBILITY_ACTIVE : ProductEnum::VISIBILITY_PASSIVE;
        $data['stock'] = $data['stock'] == 1 ? ProductEnum::STOCK_ACTIVE : ProductEnum::STOCK_PASSIVE;
        $data['push_on'] = $data['push_on'] == 1 ? ProductEnum::PUSH_ON_ACTIVE : ProductEnum::PUSH_ON_PASSIVE;
        $data['approve'] = ProductEnum::APPROVAL_PENDING;

        if (!$request->input('document', []))
            return redirect()->back()->with('error', 'Lütfen resim seçiniz');
        else
        {
            if (count($request->input('document', [])) < 3)
            {
                return redirect()->back()->with('error', 'Lütfen en az 3 resim seçiniz');
            }
            if (count($request->input('document', [])) > 5)
                return redirect()->back()->with('error', 'En fazla 5 adet resim seçiniz');
        }
        $product = Product::create($data);
        if (!$product)
        {
            File::deleteDirectory( public_path('tmp/uploads/'.auth()->id().'-'.auth()->user()->email.'/'));
            return redirect()->back()->with('error', 'Ürün eklenirken bir hata oluştu');
        }
        foreach ($request->input('document', []) as $file) {
            $product->addMedia(public_path('tmp/uploads/'.auth()->id().'-'.auth()->user()->email.'/'.$file))
                ->usingName($product->title)
                ->toMediaCollection('images');
        }

        return redirect()->back()->with('success', 'Ürün başarıyla eklendi');
    }

    public function edit(Product $product, $status = null)
    {
        $categories = Category::where('parent_id', 0)->where('status', CategoryEnum::STATUS_ACTIVE)->orderBy('name')->get();
        $brands = Brand::where('status', BrandEnum::STATUS_ACTIVE)->orderBy('name')->get();
        return view('seller.product.create-edit', compact('product', 'categories', 'brands', 'status'));
    }

    public function update(SProductStoreRequest $request, Product $product)
    {

    }

    public function rejectedProduct()
    {
        $sellerId = Seller::where('user_id', auth()->id())->first()->id;
        $products = Product::where('seller_id', $sellerId)->where('approve', ProductEnum::APPROVAL_REJECTED)->orderBy('id', 'desc')->get();
        return view('seller.product.rejected', compact('products'));
    }

    public function getSubCategories(Request $request)
    {
        $validate = $request->validate([
            'category_id' => 'required|exists:categories,id|integer'
        ]);

        $subCategories = Category::where('parent_id', $request->category_id)->where('status', CategoryEnum::STATUS_ACTIVE)->orderBy('name')->get();

        $arr = [];
        foreach ($subCategories as $subCategory)
        {
            $arr[] = '<option value="'.$subCategory->id.'">'.$subCategory->name.'</option>';
        }
        return response()->json($arr);
    }

    public function storeMedia(Request $request)
    {
        $path = public_path('tmp/uploads/'.auth()->id().'-'.auth()->user()->email.'/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

}
