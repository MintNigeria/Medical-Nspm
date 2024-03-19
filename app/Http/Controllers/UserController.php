<?php

namespace App\Http\Controllers;

use App\Models\Leaves;
use App\Models\Record;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public function home(Request $request)
    {
        return view(
            'home',
            with([
                'users' =>ModelsUser::latest()
                ->where('id', '!=', auth()->user()->id)
                ->filter(request(['search']))
                ->paginate(45),
                'records' => Record::where('locality', auth()->user()->locality)
                             ->where('status', "open")
                            ->filter(request(['search']))
                            ->paginate(45),
                'leaves' => Leaves::latest()->get(),
            ])
        );
    }

    public function index()
    {
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        return view(
            'users.index',
            with([
                'archives' =>ModelsUser::onlyTrashed(),
                'records' => Record::latest()->where('locality', auth()->user()->locality)
                            ->where('status', 'open')
                            // ->filter(request(['search']))
                            ->paginate(10),
                'users' => ModelsUser::latest()
                    ->where('id', '!=', auth()->user()->id)
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }

    public function archive()
    {
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

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
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        return view('users.register');
    }

    public function activate(ModelsUser $user)
    {
        $user->activate = !$user->activate;
        $user->save();
        if($user->activate){
         return back()->with('message','User Activated');
        }
        return back()->with('message','User Deactivated');
    }


    public function store(Request $request)
    {
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
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
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
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

    public function resetPassword(Request $request, ModelsUser $user)
    {
        if(auth()->user()->role !== 'medic-admin'){
            abort(403, 'Unauthorized Action');
         }

         $formFields['password'] = bcrypt('password');
         $formFields['is_default'] = 1;

         $user->update($formFields);
         return redirect('/users')->with(
            'message',
            'User Password Reset successfully!'
        );

    }

    public function profile()
    {
        return view('users.profile');
    }

    public function updatePassword(Request $request)
    {
        $user = ModelsUser::find(Auth::id());

        $formFields = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);


        if($formFields['password'] === 'password'){
            return redirect('/profile')->with('message', 'New Password can\'t be set to default');
        }


        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('message', 'Current Password is incorrect');
        }
        $user->is_default = 0;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::logout();
        return back()->with('success', 'Password Reset');
    }

    public function login()
    {
        return view('users.login');
    }

    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'staff_id' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            $user = auth()->user();

            if (!$user->activate) {
                auth()->logout(); // Log the user out if not active
                return back()->with('message', 'Your account is inactive. Please contact the medical administrator.');
            }

            if ($user->is_default === 1) {
                return redirect('/users/profile')->with(
                    'message',
                    'Password Not Secured, Kindly Reset'
                );
            }

            $redirects = [
                'nurse' => '/records',
                'pharmacy' => '/records/pharmacy',
                'him' => '/patient',
                'medic-admin' => '/home',
            ];

            $role = $user->role;

            if (array_key_exists($role, $redirects)) {
                return redirect($redirects[$role])->with('message', 'You are Logged In');
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
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
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
