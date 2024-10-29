<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return view('client::index', compact('bannertop', 'bannercenter', 'bannerbottom', 'slider'));
    }

    /**
     * Show the form for creating a new resource.
     */

}
