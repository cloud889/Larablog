<x-app-layout>
    <div class="mt-24 mx-64">
        <div>
            <h1 class="font-semibold text-xl">{{$blog->title}}</h1>
            <p class="mt-5 text-gray-600">{{$blog->message}}</p>
        </div>
        <div class="justify-end">
            <small class="justify-end text-gray-400">{{$blog->created_at}}</small>
        </div>
        
    </div>
   
</x-app-layout>

<h1>{{$blog->title}}</h1>