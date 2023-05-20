@include('structure/header')

<!-- Your content here -->
<main class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card w-50">
        <div class="card-body">
            <h2 class="card-title text-center">Login</h2>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button class="btn btn-primary">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

@include('structure/footer')
