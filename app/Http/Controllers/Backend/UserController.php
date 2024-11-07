<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CraeteUserRequest;
use App\Http\Requests\Backend\UpdateUserRequest;
use App\Http\Requests\Backend\UserPasswordUpdate;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        $users = User::with('roles','media.model')->paginate(10);
        return view('backend.pages.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all('name');
        return view('backend.pages.users.create', compact('roles'));
    }


    public function store(CraeteUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
        ])->assignRole($request->role);;

        if($request->hasFile('avatar')){
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        toast()->success('بەکارهێنەرەکە زیاد کرا ');
        return redirect()->route('users.index');
    }

 
    public function show(User $user)
    {
        abort(404);
    }

    public function edit(User $user)
    {
        $user = User::with('media.model')->find($user->id);
        $roles = Role::all('name');
        return view('backend.pages.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->only('name', 'email'));
        if($request->has('role')){
            try{
                DB::beginTransaction();
                $user->syncRoles($request->role);
                DB::commit();
            }
            catch(RoleDoesNotExist $e){
                DB::rollBack();
                toast()->error('Error', $e->getMessage());
                return redirect()->back();
            }
        }
        if($request->hasFile('avatar')){
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            $user->getMedia('avatar')->count();
            $user->getFirstMediaUrl('avatar'); 
        }
        toast()->success('پرۆفایلیەکە بە سەرکەوتویی نوێ کرایەوە');
        return back();
    }

    public function destroy(User $user)
    {
        if($user->hasRole('Admin')){
            toast()->error('ببوورە ناتوانی ئەم بەکارهێنەرە بسریتەوە');
            return back();
        }

        DB::beginTransaction();
        try {
            $user->delete();
            toast()->success('بەکارهێنەرەکە بە سەرکەوتویی سڕایەوە');
            DB::commit();
        } 
        catch (Exception $e) {
            DB::rollBack();
            toast()->error('ببوورە ناتوانی ئەم بەکارهێنەرە بسریتەوە');
        }
        return back();
    }

    public function updatePassword(UserPasswordUpdate $request,$id)
    {
        $user = User::findorFail($id);
        if(!Hash::check($request->old_password, $user->password)){
            toast()->error('ووشە تێپەرەکان هەڵەن');
            return back();
        }
        $user->update(['password' => bcrypt($request->password)]);
        $user->save();
        toast()->success('ووشە تێپەرەکە نوێکرایەوە');
        return back();
    }

    public function status(User $user)
    {
        if (!auth()->user()->hasPermissionTo('toggle-user-status')) {
            toast()->error('ببوورە دەسەڵاتی ئەم کردارەت نییە');
            return back();
        }

        if($user->hasRole('Admin')){
            toast()->error('ببوورە ناتوانی ئەم بەکارهێنەرە نا چالاک بکەی');
            return back();
        }

        $user->status = !$user->status;
        $user->save();
        toast()->success('دۆخی بەکارهێنەر بەسەرکەوتوویی گۆڕا');
        return back();
    }
}
