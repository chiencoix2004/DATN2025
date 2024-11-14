<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Banner;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = new Banner();
        $slider = $banner->getSliderPosition();
        $bannertop = $banner->getTopPosition();
        $bannercenter = $banner->getCenterPosition();
        $bannerbottom = $banner->getBottomPosition();
        // dd($bannerbottom);
        $products_new = Product::query()->latest('id')->where('is_active', 1)->limit(10)->get();
        return view('client::index', compact('bannertop', 'bannercenter', 'bannerbottom', 'slider', 'products_new'));
    }

    /**
     * Show the form for creating a new resource.
     */

}
