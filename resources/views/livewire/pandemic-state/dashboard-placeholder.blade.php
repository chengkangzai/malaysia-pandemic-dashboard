<section class="mt-2" wire:loading.class="animate-pulse" x-transition>
    <div class="space-y-2 sm:grid sm:grid-cols-3 sm:grid-rows-4 sm:gap-2 sm:space-y-0">
        @foreach (range(1, 12) as $card)
            <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
                <div class="mx-auto h-4 w-3/4 rounded-3xl bg-gray-500"></div>
                <div class="mx-auto my-4 h-10 w-3/4 rounded-3xl bg-gray-500"></div>
                <div class="mx-auto mt-2 h-3 w-1/2 rounded-3xl bg-gray-500"></div>
            </div>
        @endforeach

    </div>
</section>
