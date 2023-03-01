<x-layout>
    <x-slot name="content">
        <main class="max-w-lg mx-auto">
            <h1 class="text-center font-bold text-xl mb-3">Login</h1>
            <form method="POST" action="/login">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="border border-gray-400 rounded p2 w-full" required />


                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="border border-gray-400 rounded p2 w-full" required />

                </div>
                <div class="mb-6">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <button type="submit"
                        class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
                </div>
            </form>
        </main>
    </x-slot>
</x-layout>
