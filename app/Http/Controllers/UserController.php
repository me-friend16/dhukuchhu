<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $products=Product::all();
        $galleries = Gallery::all();
        $users = User::all();
        return view('user.pages.index',[
            'products'=>$products,
            'galleries' => $galleries,
            'users' => $users
        ]);
    }

    public function profile()
    {
        return view('user.pages.profile.index');
    }

  public function index()
    {
        $users = User::all();
        return view('user.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('user.pages.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $imagePath = $request->file('image')->store('uploads/users', 'public');

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'image'    => $imagePath,
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('user.user.pages.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.pages.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->hasFile('image')) {
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            $user->image = $request->file('image')->store('uploads/users', 'public');
        }

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
    
}
