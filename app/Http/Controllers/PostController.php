<?php

namespace App\Http\Controllers;

use App\Http\Requests\getPaginationPostsRequest;
use App\Http\Requests\getPostByIdRequest;
use App\Models\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function getPostByID(getPostByIdRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = Posts::find($request->get('post_id'));
        return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function getPostsLastThreeDay(): \Illuminate\Http\JsonResponse
    {
        $threeDaysAgo = Carbon::now()->subDays(3)->toDateTimeString();
        $data = Posts::where('created_at', '>=', $threeDaysAgo)->get();
        return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function getPostsPagination(getPaginationPostsRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = Posts::latest()->paginate($request->get('pagination'));
        return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
}
