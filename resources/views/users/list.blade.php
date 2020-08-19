@extends('panel.main')
@section('panel')
    <div class="card">
        <div class="card-header">
            users list
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">users name</th>
                    <th scope="col">users email</th>
                    <th scope="col">users roles</th>
                    <th scope="col">users operation</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span>{{ $role->persian_name }}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ route('users.edit', $user->id) }}">edit</a></td>
                    </tr>
                @empty
                    <p>
                        There are not any user.
                    </p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
