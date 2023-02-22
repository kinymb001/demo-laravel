<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.user.index");
    }

    public function create()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = User::findOrFail($id)->load(['roles', 'articles']);
            $roles = Role::all();
        } catch (\Exception $e) {

            session()->flash('error', $e->getMessage());
            return redirect()->route('users.index');
        }

        return view('admin.user.show', compact('data', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = User::findOrFail($id)->load(['roles', 'articles']);
            $roles = Role::all();
        } catch (\Exception $e) {

            session()->flash('error', $e->getMessage());
            return redirect()->route('users.index');
        }

        return view('admin.user.edit', compact('data', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $data = array_merge(
                $request->only([
                    'email',
                    'phone',
                    'avatar',
                    'name',
                    'description',
                ]),
            );

            if ($request->has("avatar")) {
                $file = $request->file('avatar');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/assets/images/users/';
                $fileName = Str::slug(pathinfo($fileName, PATHINFO_FILENAME)) . '-' . Carbon::now()->timestamp;
                $fileExt = $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName . "." . $fileExt);
                $data['avatar'] = $fileName . "." . $fileExt;
            }

            $user = User::findOrFail($id);
            $user->update($data);
            $user->syncRoles($request->roles);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }

        session()->flash('success', __('update_success'));
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}