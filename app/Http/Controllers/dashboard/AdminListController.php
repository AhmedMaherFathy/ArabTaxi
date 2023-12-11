<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Database\QueryException;

class AdminListController extends Controller
{
    public function index(){
        $admin = Admin::all();
        return view('adminList',compact('admin'));
    }
    public function register(Request $request){
        try {
            $request->validate([
                            'name' => 'required|string|max:255',
                            'email' => 'required|string|lowercase|email|max:255|unique:'.Admin::class,
                            'password' => ['required', Rules\Password::defaults()],
                            // 'role' => 'required',
                            'phone' => 'string',
                        ]);
                        $admin = Admin::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'role' => $request->role,
                            'password' => Hash::make($request->password),
                            'phone' => $request->phone,
                        ]);
                        
            return redirect()->route('admin.list')->with('successful' , 'تم تسجيل المتحكم بنجاح ');
        } catch (QueryException $e) {
            
            return redirect()->back()->with('failed', 'لم يتم تسجيل المتحكم ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('delete','تمت ازالته');
    }
}

// <?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rules;
// use Inertia\Inertia;
// use Inertia\Response;

// class RegisteredUserController extends Controller
// {
//     /**
//      * Display the registration view.
//      */
//     public function create(): Response
//     {
//         return Inertia::render('Auth/Register');
//     }

//     /**
//      * Handle an incoming registration request.
//      *
//      * @throws \Illuminate\Validation\ValidationException
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
//             'password' => ['required', 'confirmed', Rules\Password::defaults()],
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);

//         event(new Registered($user));

//         Auth::login($user);

//         return redirect(RouteServiceProvider::HOME);
//     }
// }
