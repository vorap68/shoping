<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller{

    /**
     * Вывод количества товаров
     */
    public function index(){
      $product_count = Product::all()->count();
      $categories = Category::all();
        return view('admin.home.index',compact('product_count','categories'));
    }
}
