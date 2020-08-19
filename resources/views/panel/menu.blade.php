<div class="card" style="width:18rem">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{ route('users.index') }}">users list</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('roles.index') }}">roles list</a>
        </li>
        <li>
            @role('admin')
            <a href="{{ route('users.index') }}" class="dropdown-item">panel</a>
            @endrole
            @can('add users')
                <li>add users</li>
            @endcan
        </li>
    </ul>
</div>
