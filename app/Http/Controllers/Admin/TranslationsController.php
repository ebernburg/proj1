<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTranslationRequest;
use App\Http\Requests\Admin\UpdateTranslationRequest;
use App\Models\Translation;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class TranslationsController
 * @package App\Http\Controllers\Admin
 */
class TranslationsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View|mixed
     */
    public function index()
    {
        $query = Translation::all();
        $translations = [];
        foreach ($query as $translation) {
            foreach (\LaravelLocalization::getSupportedLocales() as $key => $language) {
                $translations[$translation->key][$key] = (object)['value' => ''];
            }
        }
        foreach ($query as $translation) {
            $translations[$translation->key][$translation->locale] = $translation;
        }
        return view('admin.translations.index', compact('translations'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View|mixed
     */
    public function create()
    {
        return view('admin.translations.create');
    }

    /**
     * @param StoreTranslationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTranslationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        Translation::create($data);

        return redirect()->route('admin.translations.index');
    }

    /**
     * @param $key
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View|mixed
     */
    public function edit($key)
    {
        $key = base64_decode($key);
        $query = Translation::where(['key' => $key])->get();
        foreach ($query as $translation) {
            $translations[$translation->locale] = $translation;
            $translations['key'] = $key;
        }
        return view('admin.translations.edit', compact('translations'));
    }

    /**
     * @param UpdateTranslationRequest $request
     * @param $key
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTranslationRequest $request, $key): \Illuminate\Http\RedirectResponse
    {
        $key = base64_decode($key);

        $data = $request->all();

        foreach (LaravelLocalization::getSupportedLocales() as $lang_key => $language) {
            $translation = Translation::where(['key' => $key, 'locale' => $lang_key])->first();
            if (!empty($translation)) {
                $translation->value = $data[$lang_key]['value'];
                $translation->update();
            } else {
                $translation = new Translation();
                $translation->key = $data['key'];
                $translation->locale = $lang_key;
                $translation->value = $data[$lang_key]['value'] ?: '';
                $translation->save();
            }
        }
        return redirect()->route('admin.translations.index');
    }

    /**
     * @param Translation $translation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View|mixed
     */
    public function show(Translation $translation)
    {

        return view('admin.translations.show', compact('translation'));
    }

    /**
     * @param $key
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($key): \Illuminate\Http\RedirectResponse
    {
        $query = Translation::where(['key' => $key])->get();
        foreach ($query as $translation) {
            $translation->delete();
        }

        return back();
    }
}
