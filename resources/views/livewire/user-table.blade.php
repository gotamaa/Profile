<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">User Name</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Password</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <span class="font-medium">{{ $user->name }}</span>
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $user->email }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $user->password }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
