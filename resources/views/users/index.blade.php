<x-app-layout header="Users">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('user.create') }}" class="bg-black text-white px-3 py-1.5 rounded-lg">Add New Users</a>
            <table class="border border-b-0 mt-8 w-full">
                <tr class="border-b">
                    <th class="px-4 py-2 text-start">Name</th>
                    <th class="px-4 py-2 text-start">Email</th>
                    <th class="px-4 py-2 text-start">Verified</th>
                    <th class="px-4 py-2 text-start">Roles</th>
                    <th class="px-4 py-2 text-start">Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            {{ $user->name }}
                        </td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->email_verified_at }}</td>
                        <td class="px-4 py-2">
                            <div class="flex gap-2">
                                @foreach ($user->getRoleNames() as $role)
                                <span class="bg-black py-1 px-2 text-sm rounded-lg text-white">
                                    {{ $role }}
                                </span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-4 py-2 flex gap-4">
                            <a href="{{ route('user.edit', $user) }}" class="text-yellow-500">Edit</a>
                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                @csrf @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="mt-3">
                {{-- {{ $users->links('pagination::simple-tailwind') }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
