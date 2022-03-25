<?php

namespace App\Http\Controllers;

use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;
use App\Models\Language;
use Illuminate\Support\Facades\Redirect;


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

//        return LanguageResource::collection($languages);

//        return Inertia::render('Language/Index', [
//            'languages' => $languages,
//        ]);
    }


    /**
     * @param StoreLanguageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreLanguageRequest $request)
    {
        $language = new Language($request->valdated());

        return Redirect::route('languages.index');
    }

    /**
     * @param Language $language
     * @return void
     */
    public function show(Language $language)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {

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

        return Redirect::route('languages.index');
    }
}
