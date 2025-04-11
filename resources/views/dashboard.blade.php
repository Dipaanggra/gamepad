<x-app-layout header="Dashboard">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-4 lg:grid-cols-3">
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                        <h3 class="tracking-tight text-sm font-medium">Total Games</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="text-2xl font-bold">{{ $totalGames }}</div>
                        <p class="text-xs text-muted-foreground">
                            {{ $growthGames >= 0 ? '+' : '' }}{{ $growthGames }}% from last month
                        </p>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm lg:col-span-2">
                    <div class="flex flex-col space-y-1.5 p-6 pb-0">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">Games</h3>
                        <p class="text-sm text-muted-foreground">Manage your games</p>
                    </div>
                    <div class="p-6 pt-0">
                        <table class="border border-b-0 mt-4 w-full">
                            <tr class="border-b">
                                <th class="px-4 py-2 text-start">Title</th>
                                <th class="px-4 py-2 text-start">Desc</th>
                            </tr>
                            @foreach ($games as $game)
                                <tr class="border-b">
                                    <td class="px-4 py-2">
                                        {{ $game->title }}
                                    </td>
                                    <td class="px-4 py-2 truncate max-w-32">{{ $game->description }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
