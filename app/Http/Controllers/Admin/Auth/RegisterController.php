<?php
namespace App\Http\Controllers\Admin\Auth;
use App\Admin;
use App\Models\Role;
use Illuminate\Routing\Controller;
use App\Http\Requests\AdminRequest ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new admins as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role:super-admin']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Admin
     */
    public function register(AdminRequest $request)
    {
       $admin = $this->create($request->all());

        return redirect($this->redirectPath());
    }
    protected function create(array $data)
    {
        $admin = new Admin();
        $fields           = collect(\Schema::getColumnListing('admins'));
        $data['password'] = bcrypt($data['password']);
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                $admin->$field = $data[$field];
            }
        }

        $admin->save();
        $admin->roles()->sync(request('role_id'));
        return route('admin.show');
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {   $roles = Role::all();
        return view('admin.auth.register',compact('roles'));
    }
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function edit(Admin $admin)
    {
        $roles = Role::all();

        return view('admin.admins.edit', compact('admin', 'roles'));
    }

    public function update(Admin $admin, AdminRequest $request)
    {
        $request['active'] = request('activation') ?? 0;
        unset($request['activation']);
        $admin->update($request->except('role_id'));
        $admin->roles()->sync(request('role_id'));

        return redirect(route('admin.show'))->with('message', "{$admin->name} details are successfully updated");
    }

    public function destroy(Admin $admin)
    {
        $prefix = config('multiauth.prefix');
        $admin->delete();

        return redirect(route('admin.show'))->with('message', "You have deleted {$prefix} successfully");
    }
}
