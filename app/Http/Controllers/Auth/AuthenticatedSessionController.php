<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credenciais = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($credenciais) && Auth::guard('web')->user()->cargo) {
            return redirect()->route('admin.dashboard');
        } else if(Auth::guard('web')->attempt($credenciais) && !Auth::guard('web')->user()->cargo) {
            return redirect()->route('voluntario.dashboard');
        }else if(Auth::guard('ong')->attempt($credenciais)) {
            if(Auth::guard('ong')->user()->status == false){
                return back()->withErrors(['email' => 'Ong reprovada ou aguardando aprovação!']);
            }
            return redirect()->route('ong.dashboard');
        } else {
            return back()->withErrors(['email' => 'Credenciais inválidas!']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if(Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        } else if(Auth::guard('ong')->check()) {
            Auth::guard('ong')->logout();
        }
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
