@props(['data', 'title'])

<div class="relative flex flex-col items-top justify-center bg-gray-100 dark:bg-gray-900 items-center py-4">
    <div class="p-6 bg-white overflow-hidden shadow sm:rounded-lg w-4/5">
        <h1 class="capitalize font-bold">{{ $title }}</h1>
        <div class="w-full box-border flex flex-col">
            <div>
                <button class="float-right mb-5 bg-sky-500 text-white rounded py-2 px-4 hover:bg-sky-600 capitalize">
                    <a href="/admin/{{ $title }}/create">Create {{ $title }}</a>
                </button>
            </div>
            @foreach ($data as $item)
            <div class="odd:bg-gray-200 even:bg-white flex justify-between">
                @if ($title == 'project')
                <div class="col-span-2"><a href="/projects/{{$item->id}}">{{ $item->title }}</a></div>
                @else
                <div class="col-span-2">{{ $item->name }}</div>
                @endif
                <div class="flex">
                    <div><a href="/admin/{{ $title }}/{{ $item->id }}/edit">Edit <i
                                class="fa-solid fa-pen-to-square pr-5"></i></a></div>
                    <div class="text-red-500">
                        <form method="POST" action="/admin/{{ $title }}/{{ $item->id }}/delete" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-600">Delete<i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</div>