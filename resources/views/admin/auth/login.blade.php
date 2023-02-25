
@extends('admin.layouts.guest')

@section('title', 'Login')

@section('content')

    <form class="card card-md" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('سجل دخولك') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('إسم المستخدم') }}</label>                
                <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="{{ __('إسم المستخدم') }}" required autofocus tabindex="1">
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">
                    {{ __('كلمة المرور') }}                    
                </label>             
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('كلمة المرور') }}" required tabindex="2">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>            
            
            
            <div>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" tabindex="3" name="remember" />
                    <span class="form-check-label">{{ __('تذكرني') }}</span>
                </label>
            </div>
            
            @if (Route::has('password.request'))
            <span class="form-label-description">                        
                <a  href="{{ route('admin.forgot_password') }}" tabindex="5">{{ __('نسيت كلمة المرور؟؟') }}</a>
            </span>
            @endif

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('تسجيل الدخول') }}</button>
            </div>
        </div>
    </form>

    {{-- @if (Route::has('register'))
    <div class="text-center text-muted mt-3">
        {{ __("Don't have account yet?") }} <a href="{{ route('register') }}" tabindex="-1">{{ __('') }}</a>
    </div>
    @endif --}}

@endsection