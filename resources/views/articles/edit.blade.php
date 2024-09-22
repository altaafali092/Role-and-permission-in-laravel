
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Articles/create
            </h2>
            <a class="bg-slate-700 text-sm rounded-md text-white px-3 py-3"
                href="{{ route('articles.index') }}"> Back to list</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('articles.update',$article)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="text-lg font-medium">Title</label>
                            <div class="my-3">
                                <input type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg input-color" name="title" placeholder="Enter name" value="{{ old('title',$article->title) }}" id="title">
                                @error('title')
                                <p class="text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                            <label for="name" class="text-lg font-medium">Description</label>
                            <div class="my-3">
                                <textarea rows="4" type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg input-color" name="description" placeholder="Enter name" value="{{ old('name') }}" id="name">{{ old('description',$article->description) }}</textarea>
                            </div>
                            <label for="name" class="text-lg font-medium">Author</label>
                            <div class="my-3">
                                <input type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg input-color" name="author" placeholder="Enter author name" value="{{ old('author',$article->author) }}" id="name">
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                        </div>
                    </form>

                    <style>
                        .input-color {
                            color: black;
                        }

                        .input-color:invalid {
                            color: initial;
                        }
                    </style>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
