<nav class="h-screen border-r w-64 fixed bg-white sm:block hidden">
    <ul class="flex flex-col p-2 gap-2">
        <li class="text-xl font-bold mb-4 px-4 py-2 flex gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-gamepad2-icon lucide-gamepad-2">
                <line x1="6" x2="10" y1="11" y2="11" />
                <line x1="8" x2="8" y1="9" y2="13" />
                <line x1="15" x2="15.01" y1="12" y2="12" />
                <line x1="18" x2="18.01" y1="10" y2="10" />
                <path
                    d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
            </svg>
            GamePedia
        </li>
        <li class="font-bold px-4 py-2 flex items-center border rounded-lg hover:bg-black gap-2 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard">
                <rect width="7" height="9" x="3" y="3" rx="1" />
                <rect width="7" height="5" x="14" y="3" rx="1" />
                <rect width="7" height="9" x="14" y="12" rx="1" />
                <rect width="7" height="5" x="3" y="16" rx="1" />
            </svg>
            <a href="{{ route('dashboard') }}">
                Dashboard
            </a>
        </li>
        <li class="font-bold px-4 py-2 flex items-center border rounded-lg hover:bg-black hover:text-white gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-gamepad-icon lucide-gamepad">
                <line x1="6" x2="10" y1="12" y2="12" />
                <line x1="8" x2="8" y1="10" y2="14" />
                <line x1="15" x2="15.01" y1="13" y2="13" />
                <line x1="18" x2="18.01" y1="11" y2="11" />
                <rect width="20" height="12" x="2" y="6" rx="2" />
            </svg>
            <a href="{{ route('game.index') }}">
                Games
            </a>
        </li>
        @hasrole('admin')
        <li class="font-bold px-4 py-2 flex items-center border rounded-lg hover:bg-black hover:text-white gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-users-icon lucide-users">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
                <a href="{{ route('user.index') }}">
                    Users
                </a>
        </li>
        @endhasrole
    </ul>
</nav>
