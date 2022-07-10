<x-dropdown>
    <x-slot name="trigger">
        <button class=" py-2 pl-3 pr-9 text-sm font-semibold">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
        </button>
    </x-slot>
    <a href="/" class="block text-left px-3">All</a>
    @foreach ($categories as $cat)
        <a href="?category={{ $cat->slug}}&{{ http_build_query(request()->except('category', 'page'))}}"
            class="block text-left px-3">{{ $cat->name }}</a>
    @endforeach
</x-dropdown>
