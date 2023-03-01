<x-layout>
    <x-slot name="content">
        <main class="bg-stone-900">

            <div class="p-5 font-mono text-green-700 text-center text-2xl">/* Projects */</div>
            @if ($filter == 'category')
                <div class='text-sm text-white'> <a href="/projects">
                        <-BACK! </a>
                </div>
            @endif
            <section class="grid grid-cols-1 p-5 md:grid-cols-2 gap-5">

                @foreach ($projects as $p)
                    <div class="relative  mb-4">
                        <div class="bg-{{ $p->color }}"><img src="{{ url('storage/images/mockup.png') }}"
                                alt="image" />
                        </div>
                        <div
                            class="text-white opacity-0 absolute bottom-0 bg-stone-900/50 w-full h-full hover:opacity-100 flex flex-col justify-end items-center p-5">
                            <a href="/projects/{{ $p->id }}">
                                <div class="font-bold text-xl">{{ $p->title }}</div>
                                <div>{{ $p->excerpt }}</div>
                            </a>
                        </div>
                        @if ($p->category)
                            <div
                                class="text-stone-900 font-bold absolute top-0 right-0 m-3 p-1 bg-gray-300 rounded text-xs uppercase">
                                <a href="categories/{{ $p->category->slug }}">#{{ $p->category->name }}</a>
                            </div>
                        @endif
                    </div>

                    {{-- <x-snippet :data='$p' /> --}}
                @endforeach
            </section>
            @if (count($projects) && $filter == 'projects')
                <div class="text-xs mt-4 w-full text-right">{{ $projects->links() }}</div>
            @endif
        </main>
    </x-slot>
</x-layout>
