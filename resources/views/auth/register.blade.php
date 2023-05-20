@include('structure/header')

<!-- Your content here -->
<main class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card w-50">
        <div class="card-body">
            <h2 class="card-title text-center">{{ __('Register') }}</h2>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terms" id="terms">
                        <label class="form-check-label" for="terms">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </label>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

@include('structure/footer')
