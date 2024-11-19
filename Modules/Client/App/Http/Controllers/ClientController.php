<?php

namespace Modules\Client\App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;

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
    public function search(Request $request)
    {
        $keywd = $request->keywd;
        $request->session()->put('keywd', $keywd);
        $product = new Product();
        $products = $product->searchproduct($keywd);
        $categories = new Category();
        $listcategory = $categories->listcategory10();
        // dd($listcategory);
        return view('client::search.list', compact('products', 'listcategory'));
    }

    public function shortingseach(Request $request)
    {
        $keywd = $request->keywd;
        $fliter = $request->fliter;
        switch ($fliter) {
            case '1':
                $product = new Product();
                $products = $product->seachproductatoz($keywd);
                $categories = new Category();
                $listcategory = $categories->listcategory10();
                // dd($listcategory);
                return view('client::search.list', compact('products', 'listcategory'));


            case '2':
                $product = new Product();
                $products = $product->seachproductztoa($keywd);
                $categories = new Category();
                $listcategory = $categories->listcategory10();
                // dd($listcategory);
                return view('client::search.list', compact('products', 'listcategory'));

            case '3':
                $product = new Product();
                $products = $product->seachproductpricelowtohigh($keywd);
                $categories = new Category();
                $listcategory = $categories->listcategory10();
                // dd($listcategory);
                return view('client::search.list', compact('products', 'listcategory'));
            case '4':
                $product = new Product();
                $products = $product->seachproductpricehightolow($keywd);
                $categories = new Category();
                $listcategory = $categories->listcategory10();
                // dd($listcategory);
                return view('client::search.list', compact('products', 'listcategory'));

                // return ("4");
            default:
                $product = new Product();
                $products = $product->searchproduct($keywd);
                $categories = new Category();
                $listcategory = $categories->listcategory10();
                // dd($listcategory);
                return view('client::search.list', compact('products', 'listcategory'));
        }
    }

    public function searchprice(Request $request)
    {
        $keywd = $request->keywd;
        $lowprice = $request->lowprice;
        $highprice = $request->highprice;
        //validate
        $this->validate($request, [
            'lowprice' => 'required|numeric',
            'highprice' => 'required|numeric',

        ]);
        //message
       $this->validate($request, [
            'lowprice.required' => 'Giá thấp không được để trống',
            'lowprice.numeric' => 'Giá thấp phải là số',
            'highprice.required' => 'Giá cao không được để trống',
            'highprice.numeric' => 'Giá cao phải là số',
        ]);
        $product = new Product();
        $products = $product->searchproductprice($keywd, $lowprice, $highprice);
        $categories = new Category();
        $listcategory = $categories->listcategory10();
        // dd($products);
        return view('client::search.list', compact('products', 'listcategory'));
    }

    public function seachhint(Request $request)
    {
        $keywd = $request->keywd;
        $product = new Product();
        $products = $product->searchhint($keywd);
        return response()->json($products);
    }

    public function seachcategory ($id, $keywd){
        $product = new Product();
        $products = $product->searchproductbycategory($id, $keywd);
        $categories = new Category();
        $listcategory = $categories->listcategory10();
        return view('client::search.list', compact('products', 'listcategory'));
    }
    public function searchget($keywd)
    {
        session()->put('keywd', $keywd);
        $product = new Product();
        $products = $product->searchproduct($keywd);
        $categories = new Category();
        $listcategory = $categories->listcategory10();
        // dd($listcategory);
        return view('client::search.list', compact('products', 'listcategory'));
    }
}
