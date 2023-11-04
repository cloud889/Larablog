<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('larablogs.update', $larablogs) }}">
            @csrf
            @method('patch')
            <div>
                <input type="text" name="title" id="" value="{{old('title',$larablogs->title)}}" class="rounded block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <textarea
                name="message"
                class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $larablogs->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>