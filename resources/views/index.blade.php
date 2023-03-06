<x-layout>
    <x-slot name="content">
        <main class="text-xl text-white flex flex-col justify-center items-center bg-stone-900 pt-10 pb-10">
            <div id="banner" class="flex flex-col justify-center items-center pt-10 mt-10  pb-10 mb-10">
                <div class="text-6xl font-mono">
                    WEB DEVELOPER.
                </div>
                <div class="font-mono">BYUL KIM</div>
            </div>



            <div id="features" class="flex flex-col items-center text-green-600">
                <div class="mb-5 font-mono">Featured Project</div>
                <div class="m-5 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($projects as $p)

                    <x-snippet :data=$p />
                    {{--
                    <div><img src=" {{ url('storage/images/cat.jpeg') }}" alt="image" />
                    </div>
                    <div><img src="{{ url('storage/images/cat.jpeg') }}" alt="image" /></div>
                    <div><img src="{{ url('storage/images/cat.jpeg') }}" alt="image" /></div>
                    --}}
                    @endforeach
                </div>
                <div class="bg-gray-500 rounded pl-2 pr-2 text-white"><a href="/projects">View more</a></div>
            </div>
        </main>
    </x-slot>
</x-layout>