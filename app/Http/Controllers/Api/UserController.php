<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class UserController extends Controller
{
    //


    public function __construct()
    {

    }

    public function user()
    {
        return new UserResource(Auth::user()); // test
    }

    public function users(Request $request)
    {
        $pageCurrent = $request->get('page');
        if ($pageCurrent){
            $pageCurrent = $pageCurrent;
        } else {
            $pageCurrent = 1;
        }
        $users = User::query();
        $items = $users->paginate(10, ['*'], 'page', $pageCurrent);
        return UserResource::collection($items);
    }

}
