<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('permissions') }}
            </h2>
            <a class="bg-slate-700 text-sm rounded-md text-white px-3 py-2"
                href="{{ route('permissions.create') }}">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-5 text-left">#</th>
                        <th class="px-6 py-5 text-left">Name</th>
                        <th class="px-6 py-5 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($permissions as $permission)
                        <tr class="border-b">
                            <td class="px-6 py-5 text-left">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-5 text-left">
                                {{ $permission->name }}
                            </td>
                            <td class="px-6 py-5 flex justify-center items-center gap-2 text-center">
                                <a href="{{ route('permissions.edit',$permission) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                {{-- <a href="" class="bg-rose-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Delete</a> --}}
                                <form action="{{route('permissions.destroy',$permission)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-rose-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600 show_confirm" data-confirm-delete="true" type="submit">
                                         Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="my-3">
                {{ $permissions->links() }}
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
