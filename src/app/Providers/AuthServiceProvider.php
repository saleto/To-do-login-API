<?php

namespace App\Providers;

use App\Models\Users;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {



//        $this->app['auth']->viaRequest('api', function ($request) {
//
//            if ($request->header('Authorization')) {
////                return response()->json(['$key' => $request->header('Authorization')], 200);
//
////                $stripped = str_replace(' ', '', $request);
//
//                $key = explode(' ',$request->header('Authorization'));
////                $key = $request->header('Authorization');
////                    $key = $stripped;
////                return response()->json(['$key' => $request->header('Authorization')], 200);
////                $user = Users::where('api_key', $key[1])->first();
//
//                $user = Users::where('api_key', $request->header('Authorization'))->first();
//
//                if(!empty($user)){
//                    $request->request->add(['userid' => $user->id]);
//
//                }
////                else
////                {
////                    return $user = Users::where('id', '1')->first();
////                }
//                return $user;
//            }
//        });

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
                $key = explode(' ',$request->header('Authorization'));
                $user = Users::where('api_key', $key[1])->first();
                if(!empty($user)){
                    $request->request->add(['userid' => $user->id]);
                }
                return $user;
            }
        });



    }
}
