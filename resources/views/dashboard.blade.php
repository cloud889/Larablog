<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <h1>Welcome {{Auth::user()->name}} to larablogs</h1>            
                </div>
            </div>
        </div>
        <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
            @foreach ($blogs as $blog)
                <div  class="p-6 flex space-x-2 bg-white mt-2 rouded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $blog->user->name }}</span>
                                <small class="ml-2 text-xs text-gray-600">{{ $blog->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($blog->created_at->eq($blog->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($blog->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('larablogs.edit', $blog)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('larablogs.destroy', $blog)}}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('larablogs.destroy', $blog)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete')}}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                        </div>
                       
                        <div class="mt-3 text-lg">
                            <h3 class="font-semibold">{{$blog->title}}</h3>
                        </div>
                        <div>
                            <p class="mt-2 text-base text-gray-500">{{ $blog->message }}</p>
                        </div>
                        <div class="mt-3 text-gray-300 transition ease-in-out hover:text-gray-500">
                            <a href="{{ route('larablogs.show',$blog->id) }}" class="self-end">view blog</a>

                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
