<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-white">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" >
        @csrf
        @method('patch')
        <div class="mb-3"  >
            <label class="text-white" for="name" >Name</label>
            <input class="form-control" id="name"  name="name"  type="text"  value="{{$user->name}}" required  autocomplete="name" >
            <x-input-error class="mt-2" :messages="$errors->get('name')" class="mt-2 text-white" />
        </div>


        <div class="mb-3">
            <label class="text-white" for="email" >Email</label>
            <input class="form-control" id="email" name="email" type="email"  value="{{$user->email}}" required autocomplete="username"  >
            <x-input-error class="mt-2" :messages="$errors->get('email') " class="mt-2 text-white"/>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>


                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" class="underline text-sm text-white hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-white">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

        </div>
        <div>
            <button type="submit" class="btn btn-danger">Save</button>

        </div>

    </form>

</section>
