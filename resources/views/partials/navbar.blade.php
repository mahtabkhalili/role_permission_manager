<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        Academi
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="auth-btn collapse justify-content-end navbar-collapse">
        @guest
            <a class="btn btn-info mr-2" href="/login">login</a>
            <a class="btn btn-info mr-2" href="/register">register</a>
        @endguest
        @auth
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" href="#">
                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu logout-btn" aria-labelledby="navbarDropdown">

                        {{--                        <a href=""></a>--}}
                    </div>
                    <form id="logout-form" method="post" style="display: none" action="/logout">
                        @csrf
                    </form>
                </li>
            </ul>
        @endauth
    </div>
</nav>
