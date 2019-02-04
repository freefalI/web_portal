<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Avatar;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class AccountController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('show');

        // $this->middleware('can:update,user')->only(['edit','update','destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return view('account.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $posts= $user->posts()->latest()->get();
        // return view('account.show',compact(['user','posts']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();

        return view('account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        dd($request->all());
        $user = auth()->user();
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'nickname' => ['required', 'string', 'max:50', 'alpha_dash', Rule::unique('users')->ignore($user->id)],
//            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'account_type' => 'required|in:public,private',
            'avatar' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();

        $oldUserName = $user->name;
        $user->update($validated);

        if ($request->has('avatar')) {
            $user->update(['has_avatar' => true]);
            $user->getMedia('avatars')[0]->delete();
            $avatarFileName = $validated['avatar']->store('');
            Image::load('storage/' .$avatarFileName)
                ->crop(Manipulations::CROP_CENTER, 100, 100)->save();
            $user->addMedia('storage/' . $avatarFileName)->toMediaCollection('avatars');
        }
        //regenerate avatar
        elseif (!$user->has_avatar and $oldUserName != $user->name) {
            $user->getMedia('avatars')[0]->delete();

            $fileName = $user->id . '_avatar' . time() . '.png';
            Avatar::create($user->name)->save($fileName, 100);
            $user->addMedia($fileName)->toMediaCollection('avatars');
        }

        return redirect()->route('account.index');//->with('flash_message', 'User edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteAvatar()
    {
        $user = auth()->user();

        $user->getMedia('avatars')[0]->delete();

        $fileName = $user->id . '_avatar' . time() . '.png';
        Avatar::create($user->name)->save($fileName, 100);
        $user->addMedia($fileName)->toMediaCollection('avatars');

        $user->update(['has_avatar' => false]);

        return redirect()->route('account.index');//->with('flash_message', 'User edited!');
    }

}
