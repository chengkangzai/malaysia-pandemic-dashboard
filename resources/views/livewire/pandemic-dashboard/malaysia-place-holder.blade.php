<section class="mt-2" id="covid-stat" wire:loading.class="animate-pulse">
    <div class="space-y-2 sm:grid sm:grid-cols-3 sm:grid-rows-3 sm:gap-2 sm:space-y-0">
        @foreach (range(1, 4) as $_)
            @foreach (range(1, 3) as $__)
                <div class="rounded-xl bg-gray-50 py-4 shadow dark:bg-white sm:py-8">
                    <div class="mx-auto h-3 w-12 rounded-3xl bg-gray-500"></div>
                    <div class="mx-auto my-10 h-4 w-24 rounded-3xl bg-gray-500"></div>
                    <div class="mx-auto h-2 w-6 rounded-3xl bg-gray-500"></div>
                </div>
            @endforeach
        @endforeach
    </div>
</section>
