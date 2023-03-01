<x-layout>
    <x-slot name="content">
        <main class="bg-stone-900 text-white">
            <div class="p-5 font-mono text-green-700 text-center text-2xl">/* {{ $project->title }} */</div>
            <section class="p-5 max-w-4xl">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project?->image) }}" alt="image" />
                @else
                    <img src="{{ url('storage/images/mockup.png') }}" alt="image" />
                @endif
                <div class="m-5">{!! $project->body !!}</div>
                @if ($project->category)
                    <div class="mt-3 rounded bg-gray-500 flex ml-5 w-fit pl-1 pr-1">{{ $project->category->name }}
                    </div>
                @endif
            </section>
        </main>
    </x-slot>
</x-layout>
