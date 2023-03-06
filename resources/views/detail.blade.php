<x-layout>
    <x-slot name="content">
        <main class="bg-stone-900 text-white flex flex-col items-center">
            <div class="p-5 font-mono text-green-600 text-2xl">/* {{ $project->title }} */</div>
            <section class="p-5 max-w-4xl ">
                @if ($project->image)
                <img src="{{ asset('storage/' . $project?->image) }}" alt="image" />
                @else
                <img src="{{ url('storage/images/mockup.png') }}" alt="image" />
                @endif

                <div class="">{!! $project->body !!}</div>

                @if ($project->category)
                <div class="font-mono mt-5 text-green-600">//Category</div>
                <div class="rounded">{{ $project->category->name }}
                </div>
                @endif

                @if ($project->tags)
                <div class="font-mono mt-5 text-green-600">//Tags</div>
                @foreach ($project->tags as $projectTag)
                <div class="rounded"> <a href="/projects/tags/{{$projectTag->slug}}">{{$projectTag->name }}</a>
                    @endforeach
                </div>
                @endif

            </section>
        </main>
    </x-slot>
</x-layout>