<?php
    namespace App\Services\Auth;

    use Alert;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Requests\Auth\AuthRequest;

    class AuthService 
    {

        public function index()
        {
           return view('admin.login');
        }

        public function login(AuthRequest $request)
        {
            if(Auth::Attempt([
                'email' => $request->email, 'password' => $request->password
            ])){
                toast('Selamat datang kembali','success');
                return redirect('/admin');
            }
            Alert::error('Oops', 'Password Salah');
            return redirect()->back();
        }

        public function logout()
        {
            Auth::logout();
            Alert::success('success', 'Anda berhasil logout');
            return redirect('/');
        }
    }
?>