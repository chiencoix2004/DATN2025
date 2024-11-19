<?php

namespace Modules\Client\App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

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
        $posts = Post::where('published_id', 1)->latest('created_at')->paginate(5);
        return view('client::index', compact('bannertop', 'bannercenter', 'bannerbottom', 'slider', 'products_new', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */

}
