@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Manage Permission') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/manage/{{ $user->id }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="name" value="{{ $user->name }}" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="email" type="email" value="{{ $user->email }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="permission"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Permission') }}</label>

                                <div class="col-md-6">
                                    @php
                                        $index = 0;
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        {{-- <option value="{{ $permission->id }}"
                                                @if ($user->hasPermissionTo($permission->id)) selected="selected" @endif>
                                                {{ $permission->name }}</option> --}}
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="permissions[{{ $index }}]"
                                                value="{{ $permission->id }}" type="checkbox" role="switch"
                                                @if ($user->hasPermissionTo($permission->id)) checked @endif>
                                            <label class="form-check-label"
                                                for="flexSwitchCheckChecked">{{ $permission->name }}</label>
                                        </div>
                                        @php
                                            $index++;
                                        @endphp
                                    @endforeach

                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
