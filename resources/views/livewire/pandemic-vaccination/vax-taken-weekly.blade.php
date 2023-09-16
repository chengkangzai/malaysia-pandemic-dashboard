<div wire:init="load" wire:loading.class="animate-pulse">
    <div class="mt-2 flex flex-col" id="high-low-vax-taken-weekly">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="15" class="border-b bg-white py-2">
                                    <a href="#high-low-vax-taken-weekly">
                                        <h3 class="text-2xl font-bold uppercase">
                                            {{ __('total number of vaccination by vaccine type') }}</h3>
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="15" class="py-2">
                                    <div class="sm:flex sm:flex-row-reverse">
                                        <label>
                                            <span class="inline-flex text-sm font-medium leading-5 text-gray-700">
                                                {{ __('Filter by') }}
                                            </span>
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
                                <th colspan="4" class="border bg-white py-4">{{ __('Partial') }}</th>
                                <th colspan="5" class="border bg-white py-4">{{ __('Full') }}</th>
                                <th colspan="5" class="border bg-white py-4">{{ __('Booster') }}</th>
                            </tr>
                            <tr class="border text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                <th class="py-4">{{ __('Pf') }}</th>
                                <th class="py-4">{{ __('Sv') }}</th>
                                <th class="py-4">{{ __('Az') }}</th>
                                <th class="border-r py-4">{{ __('Sp') }}</th>
                                <th class="py-4">{{ __('Pf') }}</th>
                                <th class="py-4">{{ __('Sv') }}</th>
                                <th class="py-4">{{ __('Az') }}</th>
                                <th class="py-4">{{ __('Sp') }}</th>
                                <th class="border-r py-4">{{ __('Cs') }}</th>
                                <th class="py-4">{{ __('Pf') }}</th>
                                <th class="py-4">{{ __('Sv') }}</th>
                                <th class="py-4">{{ __('Az') }}</th>
                                <th class="py-4">{{ __('Sp') }}</th>
                                <th class="border-r py-4">{{ __('Cs') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($vaxs as $vax)
                                <tr class="@if ($loop->even) bg-gray-50 @endif">
                                    <td class="whitespace-nowrap border py-4">
                                        {{ $vax['weekYear'] }}
                                    </td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['pfizer1']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['sinovac1']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['astra1']) }}</td>
                                    <td class="space-y-1 border-r py-4">{{ number_format($vax['sinopharm1']) }}</td>

                                    <td class="space-y-1 py-4">{{ number_format($vax['pfizer2']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['sinovac2']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['astra2']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['sinopharm2']) }}</td>
                                    <td class="space-y-1 border-r py-4">{{ number_format($vax['cansino']) }}</td>

                                    <td class="space-y-1 py-4">{{ number_format($vax['pfizer3']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['sinovac3']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['astra3']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['sinopharm3']) }}</td>
                                    <td class="space-y-1 py-4">{{ number_format($vax['cansino3']) }}</td>
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
