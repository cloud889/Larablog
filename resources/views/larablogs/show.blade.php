<x-app-layout>
    <div class="mt-24 mx-64">
        <div class="f">
            <div>
                <h1 class="font-semibold text-xl">{{$blog->title}}</h1>
            </div>
            <div>
                <small class="justify-end text-gray-400 mt-1">{{$blog->created_at}}</small>
            </div>   
        </div>
        <div>
            <p class="mt-5 text-gray-600">{{$blog->message}}</p>
        </div>
        <div class="justify-end">
            <div class="flex justify-end gap-x-3 mt-3">
                <h3 class="text-gray-400">author: <em>{{$blog->user->name}}</em> </h3>
                
            </div> 
        </div>      
    </div>
    {{-- comment section --}}
    <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8 mt-9">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf 
            <div class="mt-4">
                <textarea
                name="message"
                placeholder="{{ __('comment') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <input type="text" name="larablog_id" value="{{$blog->id}}" type="hidden">
            </div>
            
           <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">
                {{ __('comment')}}
            </x-primary-button>
        </form>
    </div>
   
</x-app-layout>

