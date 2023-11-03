<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800" >
            {{ __('My blogs')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('larablogs.store')}}">
            @csrf 
            <div class="flex-col">
                <div><label for="title">title</label></div>
                <div>
                    <input type="text" name="title" id="" placeholder="Enter blog title" class="rounded block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
            </div>
            <div class="mt-4">
                <textarea
                name="message"
                placeholder="{{ __('Write your story') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            </div>
            
           <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">
                {{ __('Larablog')}}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>