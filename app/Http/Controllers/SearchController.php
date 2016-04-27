<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use Log;
use Curl;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ch = curl_init();
        $url = 'http://apis.baidu.com/image_search/shitu/shitu_image';
        $header = array(
            'apikey: 您自己的apikey',
        );
        $data['image'] = file_get_contents('./5.jpg'); //代搜索的图片路径;
// 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
// 添加参数
        curl_setopt($ch, CURLOPT_POSTFIELDS,  $data['image'] );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        var_dump(json_decode($res));

        return view('');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $response = '';
        $image = file_get_contents(public_path('assets/image/suan-ni.jpg'));
        try {

            $response = Curl::to('http://apis.baidu.com/image_search/shitu/shitu_image')
                ->withData(['image' => $image])
                ->withHeader('apikey: 8685513af73aa823c44d6ef7d3bf842e')
                ->get();
        } catch (Exception $e) {
            Log::error('get image info from baidu api exception,exception:' . $e->getMessage());
        }
    }

}
