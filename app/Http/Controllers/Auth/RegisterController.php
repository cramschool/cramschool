<?php

namespace App\Http\Controllers\Auth;

use App\Traits\UploadImage;
use App\User;
use App\Company;
use App\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use UploadImage;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register')->with([
            'companies' => Company::all()
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $request = request();

        $rules = [
            'company_license' => 'required|string|max:255',
            'mobile_phone' => 'required|string|min:10|max:10',
            'name' => 'required|string|max:255',
            'account' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];

        if($request->input("type") == "boss"){
            $rules = array_merge($rules, [  
                'company_name' => 'required|string|max:255',
                'company_phone' => 'required|string|min:10|max:10',
                'company_address' => 'required|string|max:255'
            ]);
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'company_license' => $data['company_license'],
            'account' => $data['account'],
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'mobile_phone' => $data['mobile_phone'],
        ]);

        if ($data['type'] == 'teacher'){
            $teacher = Teacher::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'order' => $data['order'] ?? null,
                'content' => $data['content'] ?? null,
            ]);
        }
        if ($data['type'] == 'boss'){
            $company = Company::create([
                'company_license' => $data['company_license'],
                'user_id' => $user->id,
                'name' => $data['company_name'],
                'phone' => $data['company_phone'],
                'slogan' => $data['slogan'] ?? null,
                'address' => $data['company_address'],
                'uql' => $data['uql'] ?? null,
            ]);
            if ($companyLogo = $data['company_logo']){
                $image = $this->uploadImage($companyLogo);
    
                $company->image()->create($image->toArray());
            }
        }
        if ($avatar = $data['avatar']){
            $image = $this->uploadImage($avatar);

            $user->image()->create($image->toArray());
        }

        

        return $user;
    }
}
