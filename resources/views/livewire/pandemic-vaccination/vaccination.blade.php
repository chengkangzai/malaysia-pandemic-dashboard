<div>
    @include('partial.rocket')

    <div class="mx-2 mb-10 space-y-2">

        <section class="mt-2 rounded-2xl bg-gray-50 py-2 shadow dark:bg-white dark:text-black">
            <h1 class="px-2 text-2xl font-bold sm:text-5xl">
                {{ __('Vaccination') }}
            </h1>
            <p>{{ __('This page was partially created to fulfill assignment for APLC (Advance Programming Concept) module in APU ') }}
            </p>
            <ul class="list-inside list-disc px-2">

                <li>{{ __('Data displayed') }}</li>
                <li>{{ __('All vaccination and registration in Malaysia') }}</li>
            </ul>
            <button class="my-1 rounded-full bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                wire:click="exportPL">
                {{ __('Download Prolog File') }}
                <svg class="ml-1 inline h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
            </button>
        </section>

        <livewire:pandemic-vaccination.display-more />
        <livewire:pandemic-vaccination.full-vax-by-month />
        <livewire:pandemic-vaccination.high-low-vax-taken-weekly />
        <livewire:pandemic-vaccination.vax-taken-weekly />

    </div>
    @section('footer')
        @include('layouts.footer')
    @endsection
</div>
