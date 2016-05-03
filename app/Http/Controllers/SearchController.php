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

        return view('index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $file = $request->pic;
//        if ( $request->hasFile('pic') && $file -> isValid()) {
            $clientName = $file->getClientOriginalName();

            $tmpName = $file->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.

            $realPath = $file->getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径

            $entension = $file->getClientOriginalExtension(); //上传文的后缀.

            $mimeTye = $file->getMimeType();//大家对mimeType应该不陌生了. 我得到的结果是 image/jpeg.

            $newName = md5(date('ymdhis') . $clientName) . "." . $entension;

//            $path = $file->move('upload', $newName);
            $file->move('upload', $newName);
//        }

        $response = '';
        $image = '';
        try {

            $response = Curl::to('http://apis.baidu.com/image_search/shitu/shitu_image')
                ->withHeader('Content-Type:application/x-www-form-urlencoded')
                ->withHeader('apikey: 8685513af73aa823c44d6ef7d3bf842e')
                ->withData(['image' => file_get_contents(public_path( 'upload/' .$newName))])
                ->post();
//            var_dump($response);
//            return $response;
            $response =  json_decode($response, true, JSON_UNESCAPED_UNICODE);
            if($response['extra']['errno'] == 0) {
                return view('search', ['response' => $response]);
            }
        } catch (Exception $e) {
            return $e->getMessage();
            Log::error('get image info from baidu api exception,exception:' . $e->getMessage());
        }
    }

}
