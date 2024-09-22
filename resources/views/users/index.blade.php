<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users/List') }}
            </h2>
            <a class="bg-slate-700 text-sm rounded-md text-white px-3 py-2"
                href="{{ route('users.create') }}">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-5 text-left">#</th>
                        <th class="px-6 py-5 text-left">Users</th>
                        <th class="px-6 py-5 text-left">Email</th>
                        <th class="px-6 py-5 text-left">Role</th>
                        <th class="px-6 py-5 text-left">Created At</th>
                        <th class="px-6 py-5 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="px-6 py-5 text-left">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-5 text-left">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-5 text-left">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-5 text-left">
                                {{ $user->roles->pluck('name')->implode(', ') }}
                            </td>
                            <td class="px-6 py-5 text-left">
                                {{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-5 flex justify-center items-center gap-2 text-center">
                                <a href="{{ route('users.edit', $user) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>

                                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-rose-700 text-sm rounded-md text-white px-3 py-2 hover:bg-rose-600" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-3">
                {{ $users->links() }}
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
