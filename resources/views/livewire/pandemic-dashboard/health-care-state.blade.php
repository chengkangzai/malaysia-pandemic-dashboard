<section class="mt-2 flex flex-col" id="healthcare-state" wire:init="load" xmlns:wire="" wire:loading.class="animate-pulse">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th colspan="5" class="border-b py-2">
                                <a href="#healthcare-state">
                                    <h3 class="text-2xl font-bold uppercase">{{ __('Healthcare per States') }}</h3>
                                </a>
                                <span class="float-right inline text-xs font-normal">
                                    {{ __('Updated at') }} {{ $updated_at }}
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('State') }}
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('ICU (Covid)') }} ({{ __('Utilisation') }})
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Hospital (Covid)') }} ({{ __('Utilisation') }})
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('PKRC (Covid)') }} <span class="font-black text-black">*</span>
                                ({{ __('Utilisation') }})
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Total') }} ({{ __('Overall Utilisation') }})
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($ICUs as $state => $ICU)
                            <tr class="@if ($loop->even) bg-gray-50 @endif">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="{{ route('pandemic.state', ['state' => $state]) }}"
                                                    class="cursor-pointer underline"
                                                    title="Click to see State view of {{ __($state) }}">
                                                    {{ __($state) }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($ICU) }} / {{ number_format($bed_ICU[$state] ?? 0) }}
                                    <small
                                        class="@if ($icu_covid_util[$state] > 100) text-red-900 font-bold @elseif($icu_covid_util[$state] > 70) text-red-700 @elseif($icu_covid_util[$state] > 50) text-yellow-700 @endif text-xs">
                                        {{ '(' . number_format($icu_covid_util[$state], 2) . '%)' }}
                                    </small>

                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if (($hospitals[$state] ?? 0 !== 0) || ($bed_covid[$state] ?? 0 !== 0))
                                        {{ number_format($hospitals[$state] ?? 0) }}
                                        / {{ number_format($bed_covid[$state] ?? 0) }}
                                        <small
                                            class="@if ($hospital_covid_util[$state] > 100) text-red-900 font-bold @elseif($hospital_covid_util[$state] > 70) text-red-700 @elseif($hospital_covid_util[$state] > 50) text-yellow-700 @endif text-xs">
                                            {{ '(' . number_format($hospital_covid_util[$state], 2) . '%)' }}
                                        </small>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($PKRC[$state] ?? 0 !== 0)
                                        {{ number_format($PKRC[$state] ?? 0) ?? 'N/A' }}
                                        / {{ number_format($bed_PKRC[$state] ?? 0) ?? 'N/A' }}
                                        <small
                                            class="@if ($pkrc_covid_util[$state] > 100) text-red-900 font-bold @elseif($pkrc_covid_util[$state] > 70) text-red-700 @elseif($pkrc_covid_util[$state] > 50) text-yellow-700 @endif text-xs">
                                            {{ '(' . number_format($pkrc_covid_util[$state], 2) . '%)' }}
                                        </small>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ $totalOccupancyByState[$state] }} / {{ $totalCovidBedByState[$state] }}
                                    <small
                                        class="@if ($totalUtilizationByState[$state] > 100) text-red-900 font-bold @elseif($totalUtilizationByState[$state] > 70) text-red-700 @elseif($totalUtilizationByState[$state] > 50) text-yellow-700 @endif text-xs">
                                        {{ '(' . number_format($totalUtilizationByState[$state], 2) . '%)' }}
                                    </small>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex">
                                    <div class="ml-4 font-black">
                                        {{ __('Total') }}
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($ICUs->sum()) }}
                                <small class="text-xs">
                                    {{ '(' . number_format($icu_covid_util->avg(), 2) . '%)' }}
                                </small>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($hospitals->sum()) }}
                                <small class="text-xs">
                                    {{ '(' . number_format($hospital_covid_util->avg(), 2) . '%)' }}
                                </small>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($PKRC->sum()) }}
                                <small class="text-xs">
                                    {{ '(' . number_format($pkrc_covid_util->avg(), 2) . '%)' }}
                                </small>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($totalOccupancyByState->sum(), 2) }} /
                                {{ number_format($totalCovidBedByState->sum(), 2) }}
                                <small class="text-xs">
                                    {{ '(' . number_format($totalUtilizationByState->avg(), 2) . '%)' }}
                                </small>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-white">
                            <td class="whitespace-nowrap px-6 py-4 text-left" colspan="5">
                                <div class="flex">
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">
                                            <span class="font-black text-black">*</span>
                                            {{ __('PKRC : COVID-19 Quarantine and Treatment Centre') }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
