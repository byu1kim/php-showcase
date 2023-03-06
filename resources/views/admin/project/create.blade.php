<x-layout>
    <x-slot name="content">
        <main class="max-w-lg mx-auto">
            @if ($project)
            <h1 class="text-center font-bold text-xl mb-3 mt-5">Edit: {{ $project->title }}</h1>
            <form method="POST" action="/admin/project/{{ $project->id }}/edit" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h1 class="text-center font-bold text-xl mb-3 mt-5">Create Project</h1>
                <form method="POST" action="/admin/project/create" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="mb-6">
                        <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') ?? $project?->title }}"
                            class="border border-gray-400 rounded p2 w-full" required />
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="excerpt"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">excerpt</label>
                        <textarea name="excerpt" id="excerpt" value="{{ old('excerpt') ?? $project?->excerpt }}"
                            class="border border-gray-400 rounded p2 w-full"
                            required> {{ old('excerpt') ?? $project?->excerpt }}</textarea>
                        @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">body</label>
                        <textarea name="body" id="body" class="border border-gray-400 rounded p2 w-full"
                            required> {{ old('body') ?? $project?->body }}</textarea>
                        @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="url" class="block mb-2 uppercase font-bold text-xs text-gray-700">url</label>
                        <input type="text" name="url" id="url" class="border border-gray-400 rounded p2 w-full" />
                        @error('url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="published"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">published</label>
                        <input type="date" name="published" id="published"
                            class="border border-gray-400 rounded p2 w-full" />
                        @error('published')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="category_id"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">category</label>
                        <select name="category_id" id="category_id">
                            <option value="" selected disabled>Select a Category</option>
                            <option value="">None</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == old('category_id') ||
                                $project?->category_id == $category->id) selected @endif>
                                {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="thumb"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                        <input type="file" name="thumb" id="thumb" value="{{ old('thumb') }}"
                            class="border border-gray-400 rounded p2 w-full">
                        @error('thumb')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block mb-2 uppercase font-bold text-xs text-gray-700">Image</label>
                        <input type="file" name="image" id="image" value="{{ old('image') }}"
                            class="border border-gray-400 rounded p2 w-full">
                        @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tags" class="block mb-2 uppercase font-bold text-xs text-gray-700">Tags</label>
                        <select name="tags[]" id="tags" multiple="multiple">
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @if (old('tags') && in_array($tag->id, old('tags'))) selected
                                @elseif ($project && $project->tags)
                                @foreach ($project->tags as $projectTag)
                                @if ($tag->id == $projectTag->id) selected @endif
                                @endforeach
                                @endif>
                                {{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
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