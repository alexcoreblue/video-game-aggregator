<div class="relative" x-data="{ isVisible: true }">
    <input wire:model.debounce.300ms="search" type="text" class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 py-1 pl-10" placeholder="Search...">
    <div class="absolute top-0 flex items-center ml-2 mt-1">
        <svg class="fill-current text-gray-400 w-6" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
            <path d="M0 0h24v24H0z" fill="none" /></svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-4" style="position: absolute"></div>

    @if (strlen($search) >= 2)
    <div class="absolute z-50 bg-gray-800 text-sm rounded w-64 mt-2" x-show="isVisible">
        @if (count($searchResults) > 0)
        <ul>
            @foreach ($searchResults as $game)
            <li class="border-b border-gray-700">
                <a href="{{ route('games.show', $game['slug']) }}" class="block hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-3 py-3">
                    @if (isset($game['cover']))
                    <img class="w-10" src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}" alt="cover">
                    @else
                    <img class="w-10" src="https://via.placeholder.com/264x352" alt="cover">
                    @endif
                    <span class="ml-4">{{ $game['name'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="px3 py-3 ml-4">No results for "{{ $search }}"</div>
        @endif
    </div>
    @endif
</div>