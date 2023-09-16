<section class="mt-2 flex flex-col" id="vax-state" xmlns:wire="http://www.w3.org/1999/xhtml" wire:init="load"
    wire:loading.class="animate-pulse">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th colspan="6" class="border-b py-2">
                                <a href="#vax-state">
                                    <h3 class="text-2xl font-bold uppercase">{{ __('Vaccination per States') }}</h3>
                                </a>
                                <div class="container flex flex-row-reverse">
                                    <label>
                                        <select class="mx-2 rounded bg-white ring ring-gray-200"
                                            wire:model.live="popFilter">
                                            @foreach (\App\Models\Population::POP_FILTER as $key => $filter)
                                                <option value="{{ $key }}">
                                                    {{ __($key) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <span class="py-1">{{ __('Filter By') }} : </span>
                                </div>
                                <div class="mx-auto w-full">
                                    <table>
                                        <tr>
                                            <td class="w-1/4">
                                                <div class="relative">
                                                    <div class="flex h-2 overflow-hidden rounded bg-green-50 text-xs">
                                                        <div style="width: 100%"
                                                            class="flex flex-col justify-center whitespace-nowrap rounded-full bg-green-300 text-center text-white shadow-none">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="w-1/4 px-4">
                                                {{ __('Dose 1 Cumulative') }}
                                            </td>

                                            <td class="w-1/4">
                                                <div class="relative">
                                                    <div class="flex h-2 overflow-hidden rounded bg-green-50 text-xs">
                                                        <div style="width: 100%"
                                                            class="flex flex-col justify-center whitespace-nowrap rounded-full bg-green-500 text-center text-white shadow-none">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="w-1/4 px-4">
                                                {{ __('Dose 2 Cumulative') }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <span class="float-right inline text-xs font-normal">
                                    {{ __('Updated at') }} {{ $timestamp }}
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
                                {{ __('New Dose 1 ') }}
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('New Dose 2 ') }}
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Booster 1 ') }}
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Booster 2 ') }}
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Registered') }}
                            </th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($daily_partial as $state => $dose1)
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
                                    {{ number_format($dose1) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($daily_full[$state]) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($daily_booster[$state]) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($daily_booster2[$state]) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($vaxReg[$state]) }}
                                    <small class="text-xs">
                                        {{ '(' . number_format($vaxRegPrecent[$state], 2) . '%)' }}
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
                                {{ number_format($daily_partial->sum()) }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($daily_full->sum()) }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($daily_booster->sum()) }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($daily_booster2->sum()) }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($vaxReg->sum()) }}
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-white">
                            <td class="whitespace-nowrap px-6 py-4 text-left" colspan="6">
                                <div class="flex max-w-full">
                                    <div class="ml-4">
                                        <p class="break-words text-sm font-medium text-gray-900">
                                            <span class="text-black">*</span>
                                            {{ __('* note that this will not equal the number of people who were fully vaccinated on a given date when Malaysia begins using single-dose vaccines (e.g. CanSino)') }}
                                        </p>
                                        <p class="text-sm font-medium text-gray-900">
                                            <span class="text-black">*</span>
                                            {{ __('* Percentage is calculated by the population of the state.') }}
                                            {{ __('Some state are having 100% above vaccination rate is because the vaccine count Non Malaysian as well.') }}
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
