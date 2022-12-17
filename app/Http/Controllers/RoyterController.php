<?php

namespace App\Http\Controllers;

use App\Models\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoyterController extends Controller
{
    public function create(Request $request)
    {
        $user_router = $request->router;
        $my_router = $request->router_my;

        if (!Router::Where('my_router', '=', $my_router)->exists()) {
            $router = Router::create(
                [
                    'user_router' => $user_router,
                    'my_router' => $my_router
                ]
            );

            return response()->json([
                "router" => $router->only(['user_router', 'my_router'])
            ])->setStatusCode(201, "Router is store");
        } else {
            return response()->json([
                "router" => [
                    'user_router' => $user_router,
                    'my_router' => false
                ]
            ])->setStatusCode(404, "Router is not store");
        }
    }

    public function open($my_router)
    {
        if (Router::where('my_router', '=', $my_router)->exists()) {

            $router = Router::where('my_router', '=', $my_router)->value('user_router');;

            return Redirect::to($router);
        } else {
            return Redirect::to('http://myrouters/')->setStatusCode(404, "Router is not");
        }
    }
}
