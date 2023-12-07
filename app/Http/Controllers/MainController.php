<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Artisan;


class MainController extends Controller
{

    /**
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public function mainPage()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category(Category $category)
    {
        return view('category', compact('category'));
    }

    public function product(Product $product)
    {
        return view('product', compact('product'));
    }

    /**
     * Setting session('locale') for middleware after change language
     * @return void
     */
    public function locale(Request $request)
    {
        Artisan::call('view:clear');
        $locale = $request->locale_change;
        session(['locale' => $locale]);
        return redirect()->back();
    }
}
