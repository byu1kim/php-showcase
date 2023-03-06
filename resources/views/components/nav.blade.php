<header class="bg-stone-900">
    <nav class="flex justify-between text-white text-sm p-5">
        <div class="p-3 font-bold"><a href="/">BYUL</a></div>
        <ul class="flex">
            <li class="p-3"><a href="/projects">PROJECTS</a></li>
            <li class="p-3"><a href="/about">ABOUT</a></li>
            aa
            @if (auth()->user()
                    ?->isAdmin())
                <li class="p-3"><a href="/admin">ADMIN</a></li>
            @endif
            @auth
                <li class="p-3 font-bold"> {{ auth()->user()->name }} </li>

                <li class="p-3"><a href="/logout">LOGOUT</a></li>
            @else
                <li class="p-3"><a href="/register">REGISTER</a></li>
                <li class="p-3"><a href="/login">LOGIN</a></li>
            @endauth

        </ul>
    </nav>
</header>
