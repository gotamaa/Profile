<span>
    <div>

        @if (session('message'))
            <span>{{ session('message') }}</span>
        @endif
        <form wire:submit='submit' action="">

            <input Wire:model="name" type="text" placeholder="Name">
            @error('name')
                <span class="text-red-600">
                    {{ $message }}
                </span>
            @enderror

            <input wire:model="email" type="email" placeholder="Email">
            @error('email')
                <span class="text-red-600">
                    {{ $message }}
                </span>
            @enderror

            <input wire:model="password" type="password" placeholder="Password">
            @error('password')
                <span class="text-red-600">
                    {{ $message }}
                </span>
            @enderror

            <button type="submit" value="Submit">Submit</button>
        </form>
        <h2>
            @foreach ($users as $user)
                <p>{{ $user->name }}, {{ $user->email }}, {{ $user->password }}</p>
            @endforeach

        </h2>
        {{ $users->links() }}

    </div>

</span>
