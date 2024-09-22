<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                User/Edit
            </h2>
            <a class="bg-slate-700 text-sm rounded-md text-white px-3 py-3" href="{{ route('users.index') }}"> Back to list</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('users.update',$user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg input-color" name="name" placeholder="Enter name" value="{{ old('name',$user->name) }}" id="name" required>
                            </div>
                            <label for="name" class="text-lg font-medium">Email</label>
                            <div class="my-3">
                                <input type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg input-color" name="email" placeholder="Enter name" value="{{ old('email',$user->email) }}" id="name" required>
                            </div>
                            <label for="name" class="text-lg font-medium">Name</label>
                            {{-- <div class="my-3">
                                <input type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg input-color" name="name" placeholder="Enter name" value="{{ old('name') }}" id="name" required>
                            </div> --}}

                            <div class="grid grid-cols-4 mb-3">
                                @if ($roles->isNotEmpty())
                                    @foreach ($roles as $role)
                                        <div class="mt-3">
                                            <input {{ in_array($role->name, $hasRole ??[]) ? 'checked' : '' }} type="checkbox" name="role[]" class="rounded" id="role-{{ $role->id }}" value="{{ $role->name }}">
                                            <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
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
