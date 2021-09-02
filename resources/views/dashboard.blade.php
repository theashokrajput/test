@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <th>Profile photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status </th>
                                <th>Action </th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ Illuminate\Support\Facades\Storage::url($user->images) }}" style="width:100px">
                                        </td>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->status }} </td>
                                        <td>{{ $user->status }} </td>
                                        <td><a href="{{ route('profile.edit', $user->id) }}">Edit</a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
