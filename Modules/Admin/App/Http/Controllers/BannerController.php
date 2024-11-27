<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlide;
use App\Http\Requests\UpdateSlider;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Storage;

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
    public function slider()
    {
        $data = new Banner();
        $slider = $data->getSliderPosition();
        return view('admin::contents.banner.slider')->with(compact('slider'));
    }
    public function update(UpdateSlider $request, Banner $banner)
    {
        try {
            DB::beginTransaction();
            $img = $banner->img_banner;
            if ($request->hasFile('hinh_anh')) {
                $img = Storage::put('slider/', $request->file('hinh_anh'));
            }
            $banner->update(
                [
                    'img_banner' => $img,
                    'link' => $request->lien_ket,
                    'banner_position' => 1,
                    'offer_text' => $request->offer_text,
                    'title' => $request->title,
                    'description' => $request->description,
                ]
            );
            DB::commit();
            return redirect()->route('admin.banner.slider')->with('success', 'Cập nhật thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function delete($id)
    {
        $data = new Banner();
        $banner = $data->deleteBanner($id);
        if ($banner) {
            return redirect()->route('admin.banner.list')->with('success', 'Xóa banner thành công');
        } else {
            return redirect()->route('admin.banner.list')->with('error', 'Xóa banner thất bại');
        }
    }
    public function add(StoreSlide $request)
    {
        $position = $request->vi_tri;
        if ($position ) {
            # code...
        }
        try {
            DB::beginTransaction();
            if ($position == 1) {
                $img = Storage::put('slider', $request->hinh_anh);
                $model = new Banner();
                $model->Addbanner($img, $request->lien_ket, $position, $request->offer_text, $request->title, $request->description);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Cập nhật thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
        // $file = $request->file('hinh_anh');
        // $fileName = time() . '_' . $file->getClientOriginalName();
        // $data = $file->move(public_path('uploads'), $fileName);
        // if ($data) {
        //     try {
        //         $data = new Banner();
        //         $banner = $data->Addbanner($fileName, $request->lien_ket, $request->vi_tri, $request->offer_text, $request->title, $request->description);
        //         return redirect()->route('admin.banner.list')->with('success', 'Thêm banner thành công');
        //     } catch (\Exception $e) {
        //         dd($e->getMessage());
        //     }
        // }
    }
}
