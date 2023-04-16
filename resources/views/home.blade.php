@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}



                        <div class="mt-3">Daftar User</div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col md-3">Permission</th>
                                    @can('manage user')
                                        <th scope="col">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $users)
                                    <tr>

                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                            {{-- @dd($users->name); --}}
                                            @foreach ($users->getAllPermissions() as $permission)
                                                <span class="badge rounded-pill text-bg-primary"> {{ $permission->name }}
                                                </span>
                                            @endforeach
                                        </td>
                                        @can('manage user')
                                            <td>
                                                <a href="/manage/{{ $users->id }}">
                                                    <button type="button" class="btn btn-warning">Manage</button>
                                                </a>
                                            </td>
                                        @endcan

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="mt-6 mb-2">List Permission for You</div>
                        <div>
                            @can('add')
                                <a href="/add">
                                    <button type="button" class="btn btn-primary">add</button>
                                </a>
                            @endcan
                            @can('delete')
                                <a href="/delete">
                                    <button type="button" class="btn btn-primary">delete</button>
                                </a>
                            @endcan
                            @can('display')
                                <a href="/display">
                                    <button type="button" class="btn btn-primary">display</button>
                                </a>
                            @endcan
                            @can('edit')
                                <a href="/edit">
                                    <button type="button" class="btn btn-primary">edit</button>
                                </a>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
