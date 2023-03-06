<x-layout>
    <x-slot name="content">
        <main class="max-w-lg mx-auto">
            @if ($category)
            <h1 class="text-center font-bold text-xl mb-3 mt-5">Edit Category </h1>
            <form method="POST" action="/admin/category/{{ $category->id }}/edit">
                @method('PATCH')
                @else
                <h1 class="text-center font-bold text-xl mb-3 mt-5">Create Category </h1>
                <form method="POST" action="/admin/category/create">
                    @endif

                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') ?? $category?->name }}"
                            class="border border-gray-400 rounded p2 w-full" required />
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                            class="bg-sky-500 text-white rounded py-2 px-4 hover:bg-sky-600">Submit</button>
                    </div>
                </form>
        </main>
    </x-slot>
</x-layout>