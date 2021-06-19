<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class ConfigController extends Controller
{
    public function index()
    {
        $routeCollection = Route::getRoutes();
        //dd($routeCollection);

        return view('admin.config', compact('routeCollection'));
    }
    public function iseed()
    {
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            foreach ($table as $key => $value) {
                if($value=='payments') {continue;}
                $command = 'iseed ' . $value . ' --exclude=id,created_at,updated_at,deleted_at --force';
            }
            Artisan::call($command);dump($command);
        }
      //  dd('ok');
    }

    public function clear()
    {
        Artisan::call('cache:clear');dump('cache:clear');
        Artisan::call('config:clear');dump('config:clear');
        Artisan::call('config:cache');dump('config:cache');
        Artisan::call('route:clear');dump('route:clear');
        Artisan::call('view:clear');dump('view:clear');
        Artisan::call('ide-helper:generate');dump('ide-helper:generate');
        Artisan::call('ide-helper:meta');dump('ide-helper:meta');
        Artisan::call('ide-helper:models -N');dump('ide-helper:models -N');
        system('composer dump-autoload');dump('composer dump-autoload');

        //dd('ok');

    }

    public function fresh()
    {
        Artisan::call('migrate:fresh --seed');dump('migrate:fresh --seed');
        //dd('ok');
    }

//    public function changeEn()
//    {
//        Session::put('locale', 'en');
//       // App::setLocale('en');
//
//        return back();
//    }
//
//    public function changeDe()
//    {
//       Session::put('locale', 'de');
//        //App::setLocale("de");
//
//        return back();
//    }
}
