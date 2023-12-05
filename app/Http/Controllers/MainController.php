<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{

    /**
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public function mainPage()
    {
        $categories = Category::get();
        dd($categories);

        return view('categories', compact('categories'));
    }

    public function Category($code)
    {
      //
    }

    /**
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
