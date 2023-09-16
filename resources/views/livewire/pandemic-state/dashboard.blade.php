<section class="mt-2" wire:loading.class="animate-pulse" wire:init="load" xmlns:wire="">
    <div class="space-y-2 sm:grid sm:grid-cols-3 sm:grid-rows-3 sm:gap-2 sm:space-y-0">
        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">{{ trans('pandemic.New_Case', ['day' => $cases->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-red-500 xl:text-5xl">{{ number_format($cases->cases_new) }}</p>
            <span>(+{{ round($cases->newPercentage, 2) }}%)
                <span class="font-bold">*</span>
            </span>
        </div>

        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">{{ trans('pandemic.Cumulative_Case', ['day' => $cases->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-red-500 xl:text-5xl">{{ number_format($cases->cases_cumulative) }}</p>
            <span>({{ round($cases->cumPercentage, 2) }}%)
                <span class="font-bold">*</span>
            </span>
        </div>

        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">{{ trans('pandemic.Active_Case', ['day' => $cases->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-red-500 xl:text-5xl">{{ number_format($cases->activeCase) }}</p>
            <span>({{ number_format($cases->activeCasePercentage, 2) }}%)
                <span class="font-bold">*</span>
            </span>
        </div>

        {{-- End of First Row --}}
        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-4">
            <h2 class="text-2xl">{{ __('pandemic.Deaths', ['day' => $death->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-gray-500 xl:text-5xl">{{ number_format($death->deaths_new) }}</p>
            <span> {{ __('Brought in Death (BID) ') }} :
                <span class="font-extrabold text-gray-500">{{ $death->deaths_bid }}</span>
            </span>
            <br>
            <span> {{ __('Died of disease (DOD) ') }} :
                <span class="font-extrabold text-gray-500">{{ $death->deaths_bid_dod }}</span>
            </span>
        </div>

        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">{{ trans('pandemic.Cumulative_Death', ['day' => $death->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-gray-500 xl:text-5xl">{{ number_format($death->deaths_commutative) }}
            </p>
            <span> {{ __('Fatality rate') }} :{{ number_format($fatalityRate, 2) }}% </span>
        </div>


        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">{{ trans('pandemic.Tested', ['day' => $test->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-yellow-500 xl:text-5xl">{{ number_format($test->totalTest) }}</p>
            <span>
                {{ __('Positive Rate') }}:
                <span class="font-bold">{{ number_format($positiveRate, 2) }}%</span>
                <small
                    class="text-xs">({{ number_format($positiveRateCase) }}/{{ number_format($test->totalTest) }})</small>
            </span>
            <small class="text-xs">
                ({{ $test->date?->format('Y-m-d') }})
            </small>

        </div>

        {{-- End of Second Row --}}
        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">{{ trans('pandemic.New_recovered_Case', ['day' => $cases->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-blue-500 xl:text-5xl">{{ number_format($cases->cases_recovered) }}</p>
        </div>

        <div class="rounded-xl bg-gray-50 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">{{ trans('pandemic.Cumulative_recovered', ['day' => $cases->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-blue-500 xl:text-5xl">
                {{ number_format($cases->cases_recovered_cumulative) }}</p>
        </div>

        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">
                {{ trans('pandemic.Active_Cluster', ['day' => $timestamp['test_dateDiffWord'] ?? '']) }}</h2>
            <p class="text-4xl font-bold text-yellow-500 xl:text-5xl">{{ number_format($activeClusterCount) }}</p>
        </div>

        {{-- End of Third Row --}}
        <div class="rounded-xl bg-gray-50 py-6 shadow dark:bg-white">
            <h2 class="text-2xl">{{ trans('pandemic.New_Dose_1_Jabbed', ['day' => $vax->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-green-500 xl:text-5xl">
                {{ number_format($vax->daily_partial) }}</p>
            <span>{{ __('Cumulative :') }} {{ number_format($vax->cumul_partial) }}</span>
            <span>{{ '(' . number_format($vax->firstDoseCumulPercent, 2) . '%)' }}
                <span class="font-bold">*</span>
            </span>
            <div class="relative mx-auto mt-2 w-10/12">
                <div class="flex h-2 overflow-hidden rounded bg-violet-50 text-xs">
                    <div style="width: {{ round($vax->firstDoseCumulPercent, 2) }}%"
                        class="flex flex-col justify-center whitespace-nowrap rounded-r-full bg-green-300 text-center text-white shadow-none">
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-xl bg-gray-50 py-6 shadow dark:bg-white">
            <h2 class="text-2xl">{{ trans('pandemic.New_Dose_2_Jabbed', ['day' => $vax->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-green-500 xl:text-5xl">
                {{ number_format($vax->daily_full) }}</p>
            <span>{{ __('Cumulative :') }} {{ number_format($vax->cumul_full) }}</span>
            <span>{{ '(' . number_format($vax->secondDoseCumulPercent, 2) . '%)' }}
                <span class="font-bold">*</span>
            </span>
            <div class="relative mx-auto mt-2 w-10/12">
                <div class="flex h-2 overflow-hidden rounded bg-violet-50 text-xs">
                    <div style="width: {{ round($vax->secondDoseCumulPercent, 2) }}%"
                        class="flex flex-col justify-center whitespace-nowrap rounded-r-full bg-green-500 text-center text-white shadow-none">
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-xl bg-gray-50 p-4 shadow dark:bg-white sm:py-8">
            <h2 class="text-2xl">
                {{ trans('pandemic.Percentage_of_Vaccine_Register', ['day' => $vaxReg->date_diffWord]) }}</h2>
            <p class="text-4xl font-bold text-green-500 xl:text-5xl">
                {{ number_format($vaxReg->registeredPrecent) . '%' }}
            </p>
            <span>{{ __('Registered :') }} {{ number_format($vaxReg->total) }}</span>
            {{-- End of Fourth Row --}}
        </div>
    </div>
</section>
