<?php

namespace App\Http\Controllers;

use App\Models\Leaves;
use App\Models\Record;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
// use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public function home(Request $request)
    {
        // if (auth()->user()->role !== 'medical_admin') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view(
            'home',
            with([
                'leaves' => Leaves::latest()->get(),
                'records' => Record::latest()->get(),
            ])
        );
    }

    public function index()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view(
            'users.index',
            with([
                'archives' =>ModelsUser::onlyTrashed(),
                'users' => ModelsUser::latest()
                    ->where('id', '!=', auth()->user()->id)
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }

    public function archive()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view(
            'users.archive',
            with([
                // 'archives' =>ModelsUser::withTrashed(),
                'users' => ModelsUser::onlyTrashed()
                    ->where('id', '!=', auth()->user()->id)
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }

    public function create()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'staff_id' => ['required', Rule::unique('users', 'staff_id')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'role' => 'required',
            'locality' => 'required',
        ]);

        $formFields['password'] = bcrypt('password');

        //Create User
        ModelsUser::create($formFields);

        return redirect('/users')->with(
            'message',
            'New User created successfully!'
        );
    }


    public function update(Request $request, ModelsUser $user){
        $formFields = $request->validate([
            'name' => ['required'],
            'staff_id' => ['required', Rule::unique('users')->ignore($user)],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ],
            'role' => 'required',
            'locality' => 'required',
        ]);

        $formFields['password'] = bcrypt('password');

        //Create User
        $user->update($formFields);

        return redirect('/users')->with(
            'message',
            'User Updated successfully!'
        );
    }

    public function login()
    {
        return view('users.login');
    }

    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'staff_id' => ['required'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'nurse') {
                return redirect('/records')->with(
                    'message',
                    'You are Logged In'
                );
            } elseif (auth()->user()->role == 'pharmacy') {
                return redirect('/records/pharmacy')->with(
                    'message',
                    'You are Logged In'
                );
            } elseif (auth()->user()->role == 'him') {
                return redirect('/patient')->with(
                    'message',
                    'You are Logged In'
                );
            }

            return redirect('/home')->with('message', 'You are now logged in!');
        }

        return back()->with('message', 'Invalid Credentials');
    }

    public function restore(ModelsUser $user)
    {

        $user->restore();
        return back()->with('message', 'User restored successfully');
    }


    public function destroy(ModelsUser $user)
    {
        if($user->trashed()){
            $user->forceDelete();
          return back()->with('message', 'User deleted permanently');

        }
        $user->delete();
        return back()->with('message', 'User deleted successfully');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
