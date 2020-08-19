@extends('panel.main')
@section('panel')
    <div class="card">
        <div class="card-header">
            users edit role
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('roles.update', $role->id) }}">
                @csrf
                <div class="flex-row">
                    <div class="col">
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}"
                               placeholder="users role name">
                        @if($errors->has('name'))
                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="col">
                        <input type="text" name="persian_name" class="form-control" value="{{ $role->persian_name }}"
                               placeholder="users role persian name">
                        @if($errors->has('persian_name'))
                            <small class="form-text text-danger">{{ $errors->first }}</small>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    @forelse($permissions as $permission)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" name="permissions[]"
                                   {{ $role->permissions->contains($permission)?'checked':'' }} value="{{ $permission->name }}"
                                   class="custom-control-input" id="{{ 'permission'.$permission->id }}">
                            <label for="{{ 'permission'.$permission->id }}" class="custom-control-label">{{ $permission->persian_name }}</label>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">users edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
