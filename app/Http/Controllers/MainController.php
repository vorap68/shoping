<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class MainController extends Controller
{

    /**
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public function mainPage()
    {
        // $categories = Category::get();
        return view('categories');
    }

    public function category(Category $category,Request $request)
    {
        $allProducts = $category->products;
        $currentPage = Paginator::resolveCurrentPage();
        // Задаем кол-во элементов на страницу
        $perPage = 3;
        // Выбираем элементы для текущей страницы
        $currentPageItems = $allProducts->slice(($currentPage - 1) * $perPage, $perPage);
        // Создаем экземпляр класса Paginator
        $paginateProducts = new Paginator($currentPageItems, count($allProducts), $perPage);
        // Указываем URI для генерации ссылок пагинации
        $paginateProducts->setPath($request->url());
        //dd($paginateProducts);
        // dd($category->products->toArray());
        //return view('category', compact('category'));
        return view('category', compact('paginateProducts', 'category'));
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

    /**
     * Setting into session_currency
     */
    public function currency($code)
    {
        session(['currency' => $code]);
        return redirect()->back();
    }
}
