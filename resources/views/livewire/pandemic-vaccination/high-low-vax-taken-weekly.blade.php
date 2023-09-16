<div wire:init="load" wire:loading.class="animate-pulse">
    <div class="mt-2 flex flex-col" id="high-low-vax-taken-weekly">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="13" class="border-b bg-white py-2">
                                    <a href="#high-low-vax-taken-weekly">
                                        <h3 class="text-2xl font-bold uppercase">
                                            {{ __('Highest and Lowest Vaccination taken weekly') }}</h3>
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="13" class="py-2">
                                    <div class="sm:flex sm:flex-row-reverse">
                                        <label>
                                            <span
                                                class="inline-flex text-sm font-medium leading-5 text-gray-700">{{ __('Filter by') }}</span>
                                            <select wire:model.live="weekToLoad" class="rounded-lg">
                                                <option value="7">{{ __('Last 7 weeks') }}</option>
                                                <option value="14">{{ __('Last 14 weeks') }}</option>
                                                <option value="30">{{ __('Last 30 weeks') }}</option>
                                                <option value="{{ $weekToLoadMax }}">{{ __('Max Weeks : ') }}
                                                    {{ $weekToLoadMax }}</option>
                                            </select>
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            <tr class="text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                <th rowspan="2" class="border py-4">{{ __('Week of / Year') }}</th>
                                <th colspan="3" class="border bg-white py-4">{{ __('Partial') }}</th>
                                <th colspan="3" class="border bg-white py-4">{{ __('Full') }}</th>
                                <th colspan="3" class="border bg-white py-4">{{ __('Booster') }}</th>
                            </tr>
                            <tr class="border text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                <th class="py-4">{{ __('Vax Type') }}</th>
                                <th class="py-4">{{ __('Volume') }}</th>
                                <th class="border-r py-4">{{ __('Date') }}</th>
                                <th class="py-4">{{ __('Vax Type') }}</th>
                                <th class="py-4">{{ __('Volume') }}</th>
                                <th class="border-r py-4">{{ __('Date') }}</th>
                                <th class="py-4">{{ __('Vax Type') }}</th>
                                <th class="py-4">{{ __('Volume') }}</th>
                                <th class="border-r py-4">{{ __('Date') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($vaxs as $week => $vax)
                                <tr class="@if ($loop->even) bg-gray-50 @endif">
                                    <td class="whitespace-nowrap border py-4">
                                        {{ $week }}
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-pink-100 px-2 text-xs font-semibold text-pink-800">
                                            {{ $vax['min1']['name'] }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold text-green-800">
                                            {{ $vax['max1']['name'] }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <p>{{ number_format($vax['min1']['value']) }}</p>
                                        <p>{{ number_format($vax['max1']['value']) }}</p>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap border-r py-4">
                                        <p>{{ $vax['min1']['date'] }}</p>
                                        <p>{{ $vax['max1']['date'] }}</p>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-pink-100 px-2 text-xs font-semibold text-pink-800">
                                            {{ $vax['min2']['name'] }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold text-green-800">
                                            {{ $vax['max2']['name'] }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <p>{{ number_format($vax['min2']['value']) }}</p>
                                        <p>{{ number_format($vax['max2']['value']) }}</p>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap border-r py-4">
                                        <p>{{ $vax['min2']['date'] }}</p>
                                        <p>{{ $vax['max2']['date'] }}</p>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-pink-100 px-2 text-xs font-semibold text-pink-800">
                                            {{ $vax['min3']['name'] }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold text-green-800">
                                            {{ $vax['max3']['name'] }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <p>{{ number_format($vax['min3']['value']) }}</p>
                                        <p>{{ number_format($vax['max3']['value']) }}</p>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap border-r py-4">
                                        <p>{{ $vax['min3']['date'] }}</p>
                                        <p>{{ $vax['max3']['date'] }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        <tfoot>
                            <tr class="bg-white">
                                <td class="border-r"></td>
                                <td class="whitespace-nowrap px-6 py-4 text-left" colspan="6">
                                    <p class="inline break-words text-sm font-medium text-gray-900">
                                        <span class="text-black">* </span>{{ __('Pf: Pfizer') }}
                                    </p>
                                    <p class="inline break-words text-sm font-medium text-gray-900">
                                        {{ __('Sp: Sinopharm') }}
                                    </p>
                                    <p class="inline break-words text-sm font-medium text-gray-900">
                                        {{ __('Az: Astrazeneca') }}
                                    </p>
                                    <p class="inline break-words text-sm font-medium text-gray-900">
                                        {{ __('Sv: Sinovac') }}
                                    </p>
                                    <p class="inline break-words text-sm font-medium text-gray-900">
                                        {{ __('Cs: Cansino') }}
                                    </p>
                                </td>
                                <td colspan="8">

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
