<x-user-layout>
    <section class="bg-muted py-12">
        <div class="container px-4 md:px-6">
            <div class="flex flex-col items-center justify-center space-y-4 text-center">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">Browse All Games</h1>
                    <p class="mx-auto max-w-[700px] text-muted-foreground md:text-xl">Discover and play hundreds of games
                        across different categories</p>
                </div>
            </div>
        </div>
    </section>
    <section class="border-b py-6">
        <div class="container px-4 md:px-6">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <form action="" class="relative w-full max-w-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-search absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input
                        class="flex h-10 rounded-md border border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full bg-background pl-8 shadow-none"
                        placeholder="Search games..." type="search" name="search">
                </form>
            </div>
        </div>
    </section>
    <section class="py-12">
        <div x-data="{
            page: 1,
            loading: false,
            loadMore() {
                this.loading = true;
                this.page++;
                let params = new URLSearchParams(window.location.search);
                params.set('page', this.page);

                fetch(`{{ route('user.game') }}?${params.toString()}`, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.text())
                    .then(html => {
                        if (html.trim() === '') {
                            this.loading = false;
                            $refs.loadMoreBtn.remove(); // Hapus tombol kalau tidak ada data
                            return;
                        }
                        $refs.gameGrid.insertAdjacentHTML('beforeend', html);
                        this.loading = false;
                    });
            }
        }" class="container px-4 md:px-6">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4" x-ref="gameGrid">
                @include('user._game_list')
            </div>

            <div class="mt-12 flex justify-center">
                <button x-ref="loadMoreBtn" x-on:click="loadMore" x-bind:disabled="loading"
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 rounded-md px-8">
                    <span x-show="!loading">Load More Games</span>
                    <span x-show="loading">Loading...</span>
                </button>
            </div>
        </div>

    </section>
</x-user-layout>
