<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function authenticates(){
//        $this->ensureIsNotRateLimited();

        if(!Auth::attempt($this->only('email', 'password') . $this->filled('remember'))){
            RateLimiter::hit($this->throttlekey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $user = Auth::admin();

        event(new LoginHistory($user));
        RateLimiter::clear($this->throttlekey());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
