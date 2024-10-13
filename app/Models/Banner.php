<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'img_banner',
        'link',
        'banner_position',
        'created_at',
        'updated_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }
    public function getBanner()
    {
        return $this->select('id', 'img_banner', 'link','banner_position')->get();
    }

    public function Addbanner( $image, $link, $banner_position)
    {
        return $this->insert([
            'img_banner' => $image,
            'link' => $link,
            'banner_position' => $banner_position,
        ]);
    }
    public function updateBanner($id, $image, $link, $banner_position)
    {
        return $this->where('id', $id)->update([
            'img_banner' => $image,
            'link' => $link,
            'banner_position' => $banner_position,
        ]);
    }
    public function updateBannerNoImg($id, $link, $banner_position)
    {
        return $this->where('id', $id)->update([
            'link' => $link,
            'banner_position' => $banner_position,
        ]);
    }
    public function deleteBanner($id)
    {
        return $this->where('id', $id)->delete();
    }
}
