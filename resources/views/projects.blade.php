<x-layout>
    <x-slot name="content">
        <main class="bg-stone-900">

            <div class="p-5 font-mono text-green-700 text-center text-2xl">/* Projects */</div>
            @if ($filter == 'category')
            <div class='text-sm text-white pl-5'> <a href="/projects">
                    <-BACK </a>
            </div>
            @endif
            <section class="grid grid-cols-1 p-5 md:grid-cols-2 gap-5">

                @foreach ($projects as $p)
                <x-snippet :data=$p />
                @endforeach
            </section>
            @if (count($projects) && $filter == 'projects')
            <div class="text-xs mt-4 w-full text-right p-5">{{ $projects->links() }}</div>
            @endif
        </main>
    </x-slot>
</x-layout>