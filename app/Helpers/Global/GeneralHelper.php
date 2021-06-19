<?php
//
//if (! function_exists('view')) {
//    function view($view = null, $data = [], $mergeData = [])
//    {
//        $factory = app(Illuminate\Contracts\View\Factory::class);
//
//        if (func_num_args() === 0) {
//            return $factory;
//        }
//
//        //if amp, add '-amp' to view name
//        if (request()->segment(1) == 'amp') {
//            if (view()->exists($view . '-amp')) {
//                $view .= '-amp';
//            } else {
//                abort(404);
//            }
//        }
//        return $factory->make($view, $data, $mergeData);
//    }
//}
//if (! function_exists('app_name')) {
//    /**
//     * Helper to grab the application name.
//     *
//     * @return mixed
//     */
//    function app_name()
//    {
//        return config('app.name');
//    }
//}
//
//if (! function_exists('gravatar')) {
//    /**
//     * Access the gravatar helper.
//     */
//    function gravatar()
//    {
//        return app('gravatar');
//    }
//}
//
//if (! function_exists('home_route')) {
//    /**
//     * Return the route to the "home" page depending on authentication/authorization status.
//     *
//     * @return string
//     */
//    function home_route()
//    {
//        if (auth()->check()) {
//            if (auth()->user()->can('view backend')) {
//                return 'admin_mix.dashboard';
//            }
//
//            return 'frontend_mix.user.dashboard';
//        }
//
//        return 'frontend_mix.index';
//    }


//}

//if (!function_exists('_t')) {
//    function _t($key = null, $default = null, $locale = null)
//    {
//        $locale = $locale ?? LaravelLocalization::getCurrentLocale();
//        $word = \App\Models\Translation::where([['locale', $locale], ['key', $key]])->first();
//        if (!isset($word)) {
//            $default_internal = is_array($default) ? null : $default;
//            $trans = new \App\Models\Translation();
//            $trans->locale = $locale;
//            $trans->key = $key;
//            $trans->value = $default_internal ?: $key;
//            $trans->save();
//            return $default_internal ?: $key;
//        } else {
//            if (is_array($default)) {
//                foreach ($default as $change_key => $change_value) {
//                    $replaced_value = str_replace('{' . $change_key . '}', $change_value, $word->value);
//                }
//            }
//
//            return $replaced_value ?? $word->value;
//        }
//    }
//}

if (!function_exists('_t')) {
    function _t($key = null, $default = null, $locale = null)
    {
        $locale = is_null($locale) ? LaravelLocalization::getCurrentLocale() : $locale;
        $word = \App\Models\Translation::where([['locale', $locale], ['key', $key]])->first();
        if (!isset($word)) {
            $trans = new \App\Models\Translation;
            $trans->locale = $locale;
            $trans->key = $key;
            $trans->value = $default ?: $key;
            $trans->save();
            return $default ?: $key;
        } else {
            return $word->value;
        }
    }
}


//if ( ! function_exists('escape_sql'))
//{
//    function escape_sql($string)
//    {
//        return app('db')->getPdo()->quote($string);
//    }
//}
//
//if (! function_exists('escape_like')) {
//    /**
//     * @param $string
//     * @return mixed
//     */
//    function escape_like($string)
//    {
//        $search = array('%', '_');
//        $replace   = array('\%', '\_');
//        return str_replace($search, $replace, $string);
//    }
//}
