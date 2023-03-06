{{-- <header class="bg-stone-900">
    <nav class="grid grid-cols-3 text-white text-sm p-5">
        <div class="p-3 font-bold"><a href="/">BYUL</a>
            <div></div>
        </div>
        <ul class="flex justify-center" id="menu-button">
            <li class="p-3"><a href="/projects">PROJECTS</a></li>
            <li class="p-3"><a href="/about">ABOUT</a></li>
        </ul>
        <ul class="flex justify-end"> @if (auth()->user()
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
</header> --}}


<header class="bg-stone-900 text-white">
    <nav class="
          flex flex-wrap
          items-center
          justify-between
          w-full
          py-4
          md:py-0
          px-4
          text-lg
        ">
        <div class="font-bold">
            <a href="/">
                BYUL
            </a>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

        <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
            <ul class="
              pt-4
              text-base
              md:flex
              md:justify-between 
              md:pt-0">
                <li class="md:p-4 py-2 hover:text-sky-400">
                    <a href="/projects">Project</a>
                </li>
                <li class="md:p-4 py-2 hover:text-sky-400">
                    <a href="/about">About</a>
                </li>

                @if (auth()->user()
                ?->isAdmin())
                <li class="md:p-4 py-2 hover:text-sky-400">
                    <a href="/admin">Admin</a>
                </li>
                @endif
                <li>
                    @auth
                <li class="md:p-4 py-2 hover:text-sky-400">
                    <a href="/logout">Logout</a>
                </li>
                <li class="md:p-4 py-2 font-bold"> Hello, {{ auth()->user()->name }}! </li>
                </li>

                @else
                <li class="md:p-4 py-2 hover:text-sky-400">
                    <a href="/login">Login</a>
                </li>
                <li class="md:p-4 py-2 hover:text-sky-400">
                    <a href="/admin">Signup</a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>