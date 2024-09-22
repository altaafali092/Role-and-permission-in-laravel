<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               Article Lists
            </h2>
            <a class="bg-slate-700 text-sm rounded-md text-white px-3 py-2"
                href="{{ route('articles.create') }}">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-5 text-left">#</th>
                        <th class="px-6 py-5 text-left">title</th>
                        <th class="px-6 py-5 text-left">description</th>
                        <th class="px-6 py-5 text-left">Author</th>
                        <th class="px-6 py-5 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($articles as $article)
                        <tr class="border-b">
                            <td class="px-6 py-5 text-left">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-5 text-left">
                                {{ $article->title }}
                            </td>
                            <td class="px-6 py-5 text-left">
                                {{ $article->description }}
                            </td>
                            <td class="px-6 py-5 text-left">
                                {{ $article->author }}
                            </td>
                            <td class="px-6 py-5 flex justify-center items-center gap-2 text-center">
                                <a href="{{ route('articles.edit',$article) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                {{-- <a href="" class="bg-rose-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Delete</a> --}}
                                <form action="{{route('articles.update',$article)}}" method="POST" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-rose-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600 show_confirm"  type="submit">
                                         Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="my-3">
                {{ $articles->links() }}
            </div>

        </div>
    </div>
    </div>

<script>
    function confirmDelete() {
        return confirm('Do you want to delete this article?');
    }
</script>
</x-app-layout>
