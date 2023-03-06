@props(['data'])

<div class="relative  mb-4">

    <div class="bg-{{ $data->color }}">
        @if($data->thumb)
        <img src="{{ asset('storage/' . $data?->thumb) }}" alt="image" />
        @else
        <img src="{{ url('storage/images/mockup.png') }}" alt="image" />
        @endif
    </div>
    <div
        class="text-white opacity-0 absolute bottom-0 bg-stone-900/50 w-full h-full hover:opacity-100 flex flex-col justify-end items-center p-5">
        <a href="/projects/{{ $data->id }}">
            <div class="font-bold text-xl">{{ $data->title }}</div>
            <div>{{ $data->excerpt }}</div>
        </a>
    </div>
    @if ($data->category)
    <div class="text-stone-900 font-bold absolute top-0 right-0 m-3 p-1 bg-gray-300 rounded text-xs uppercase">
        <a href="/projects/categories/{{ $data->category->slug }}">#{{ $data->category->name }}</a>
    </div>
    @endif
</div>