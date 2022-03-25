<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;


class LanguageController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $languages = Language::query()
            ->orderBy('name')
            ->paginate();

        return LanguageResource::collection($languages);

//        return Inertia::render('Language/Index', [
//            'languages' => $languages,
//        ]);
    }


    /**
     * @param StoreLanguageRequest $request
     * @return LanguageResource
     */
    public function store(StoreLanguageRequest $request)
    {
        $language = new Language($request->valdated());

        return LanguageResource::make($language);
    }


    /**
     * @param Language $language
     * @return LanguageResource
     */
    public function show(Language $language)
    {
        return LanguageResource::make($language);

        //        return Inertia::render('Language/Show', [
        //            'language' => $language,
        //        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //        return Inertia::render('Language/Edit', [
        //            'language' => $language,
        //        ]);
    }



    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $language->update($request->validated());

        return redirect('languages.show');
    }


    /**
     * @param Language $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('languages.index');
    }
}
