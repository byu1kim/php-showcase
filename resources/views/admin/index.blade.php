<x-layout>
    <x-slot name="content">
        <div class="p-7 text-center uppercase text-xl font-bold bg-gray-100">Admin</div>
        <x-admin-card :data=$projects title="project" />
        <x-admin-card :data=$users title="user" />
        <x-admin-card :data=$categories title="category" />
        <x-admin-card :data=$tags title="tag" />
    </x-slot>
</x-layout>
