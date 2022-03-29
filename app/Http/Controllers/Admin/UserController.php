<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $users = User::query()
            ->orderBy('surname')
            ->orderBy('name')
            ->paginate();

        return Inertia::render('Admin/User/Index', [
            'users' => $users,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Inertia\Response
     */
    public function edit(User $user): Response
    {
        return Inertia::render('Admin/User/Edit', [
            'user' => $user,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $user->fill($data);
        $user->is_active = $data['is_active'];
        $user->save();

        return Redirect::route('admin.users.index');
    }

}
