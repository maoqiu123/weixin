<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Carousel extends Authenticatable
{
    protected $fillable = [
        'order', 'url',
    ];
    protected $table = 'carousels';
    public function add($carousel,$order){
        $path = $carousel->storeAS(
            'carousels',uniqid().'.jpg'
        );
        $url = 'http://www.thmaoqiu.cn/poetry/storage/app/'.$path;
        $carousels = new Carousel();
        $carousels->url = $url;
        $carousels->order = $order;
        if ($carousels->save()){
            return response()->json(['code'=>0,'msg'=>"轮播图添加成功"]);
        }else{
            return response()->json(['code'=>1,'msg'=>'轮播图添加失败']);
        }
    }
    public function del($order){
        $carousels = new Carousel();
        if ($carousels->where('order',$order)->first()){
            if ($carousels->delete()){
                return response()->json(['code'=>0,'msg'=>'删除轮播图成功']);
            }else{
                return response()->json(['code'=>1,'msg'=>'删除轮播图失败']);
            }
        }else{
            return response()->json(['code'=>4,'msg'=>'轮播图未找到']);
        }
    }
    public function show(){
        $carousels = new Carousel();
        $imgs = $carousels->orderBy('order')->chunk(3, function ($orders) {
            $i =1;
            foreach ($orders as $order) {
                $imgs[$i] = $order->url;
                $i++;
            }
            return $imgs;
        });
        return response()->json(['code'=>0,'msg'=>'查询轮播图成功','data'=>$imgs]);
    }

}