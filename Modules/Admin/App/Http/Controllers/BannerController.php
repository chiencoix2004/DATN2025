<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data = new Banner();
            $banner = $data->getBanner();
        return view('admin::contents.banner.list')->with(compact('banner'));
    }
    public function update(Request $request)
    {
        //print_r($request->all());

        $file = $request->file('hinh_anh');
        if (isset($file)){
            $file = $request->file('hinh_anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $data =  $file->move(public_path('uploads'), $fileName);
            if ($data) {
                try {
                     $data = new Banner();
                     $banner = $data->updateBanner($request->id_banner, $fileName, $request->lien_ket, $request->vi_tri, $request->offer_text, $request->title, $request->description);
                     return redirect()->route('admin.banner.list');
                 } catch (\Exception $e) {
                     dd($e->getMessage());
                 }
                }
        } else {
            $data = new Banner();
            $banner = $data->updateBannerNoImg($request->id_banner, $request->lien_ket, $request->vi_tri, $request->offer_text, $request->title, $request->description);
            return redirect()->route('admin.banner.list');
        }

    }
    public function delete($id)
    {
        $data = new Banner();
        $banner = $data->deleteBanner($id);
        if($banner){
            return redirect()->route('admin.banner.list')->with('success', 'Xóa banner thành công');
        } else {
            return redirect()->route('admin.banner.list')->with('error', 'Xóa banner thất bại');
        }
    }
    public function add(Request $request)
    {
        $file = $request->file('hinh_anh');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $data =  $file->move(public_path('uploads'), $fileName);
        if ($data) {
            try {
                $data = new Banner();
                $banner = $data->Addbanner( $fileName, $request->lien_ket, $request->vi_tri, $request->offer_text, $request->title, $request->description);
                return redirect()->route('admin.banner.list')->with('success', 'Thêm banner thành công');
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
    }


}
