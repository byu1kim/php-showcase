@props(['data', 'title'])

<div class="relative flex flex-col items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="p-6 bg-white overflow-hidden shadow sm:rounded-lg w-4/5">
        <h1>{{ $title }}</h1>
        <table class="w-full box-border">

            <button class="float-right mb-5 bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">
                <a href="/admin/{{ $title }}/create">Create {{ $title }}</a>
            </button>
            @foreach ($data as $item)
                <tr class="odd:bg-gray-200 even:bg-white">
                    @if ($title == 'project')
                        <td>{{ $item->title }}</td>
                    @else
                        <td>{{ $item->name }}</td>
                    @endif
                    <td><a href="/admin/{{ $title }}/{{ $item->id }}/edit">Edit <i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="text-red-500">
                        <form method="POST" action="/admin/{{ $title }}/{{ $item->id }}/delete"
                            class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-600">Delete<i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</div>
