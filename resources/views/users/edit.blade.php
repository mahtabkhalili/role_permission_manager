@extends('panel.main')
@section('panel')
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        <div class="form-group">
            <span>add role to user</span>
            <hr>
        </div>
        <div class="form-group">
            @forelse($roles as $role)
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="role[]" value="{{ $role->name }}" class="custom-control-input"
                           id="{{ 'role'. $role->id }}" {{ $user->roles->contains($role)? 'checked': ''}}>
                    <label for="{{ 'role'. $role->id }}">{{ $role->persian_name }}</label>
                </div>
            @empty
                <p>
                    No roles.
                </p>
            @endforelse
        </div>
        <div class="form-group">
            <span>add permission to user</span>
            <hr>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox custom-control-inline">
                @forelse($permissions as $permission)
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                           class="custom-control-input" {{ $user->permissions->contains($permission)? 'checked':'' }}
                           id="{{ 'permission'. $permission->id }}">
                    <label for="{{ 'permission'. $permission->id }}"
                           class="custom-control-label">{{ $permission->persian_name }}</label>
                @empty
                    <p>
                        No Permission.
                    </p>
                @endforelse
            </div>
        </div>
        <br>
        <div class="form-group mt-5">
            <button class="btn btn-primary">update</button>
        </div>
    </form>
@endsection
