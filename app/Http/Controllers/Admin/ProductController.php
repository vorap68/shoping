<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Classes\ImageSaver;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $imageSaver;

    public function __construct(ImageSaver $imageSaver)
    {
        $this->imageSaver = $imageSaver;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allInCategory($id)
    {
        $products = Product::where('category_id', $id)->get();
        $categoryName = Category::findOrFail($id)->name_ru;
        return view('admin.product.index', compact('products', 'categoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $params = $request->all();
        if (!is_null($request->file('image'))) {
            $category_code = Category::findOrFail($request->category_id)->code;
            $image_name = $this->imageSaver->upload($request, null, 'products/' . $category_code);
            $params['image'] = $image_name;
        };
        Product::create($params);
        return redirect()->route('all.incategory', $request->category_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all();
        if (!is_null($request->file('image')) || isset($request->remove)) {
                      $category_code =$product->category->code;
            $image_name = $this->imageSaver->upload($request, $product, 'products/' . $category_code);
            $params['image'] = $image_name;
        }
        $product->update($params);
        return redirect()->route('all.incategory', $product->category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
