@php
    /* @var App\Models\VaxMalaysia $vax */
    /* @var App\Models\VaxRegMalaysia $reg */
@endphp

<div wire:init="load" wire:loading.class="animate-pulse">
    <div class="mt-2 flex flex-col" id="vax-data">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="13" class="border-b bg-white py-2">
                                    <a href="#vax-data">
                                        <h3 class="text-2xl font-bold uppercase">{{ __('Vaccination Data') }}</h3>
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="13" class="py-2">
                                    <div class="sm:flex sm:flex-row-reverse">
                                        <label>
                                            <span
                                                class="inline-flex text-sm font-medium leading-5 text-gray-700">{{ __('Filter by') }}</span>
                                            <select wire:model.live="vaxDaysToShow" class="rounded-lg">
                                                <option value="7">{{ __('Last 7 days') }}</option>
                                                <option value="14">{{ __('Last 14 days') }}</option>
                                                <option value="30">{{ __('Last 30 days') }}</option>
                                                <option value="60">{{ __('Last 60 days') }}</option>
                                                <option value="90">{{ __('Last 90 days') }}</option>
                                                <option value="180">{{ __('Last 180 days') }}</option>
                                            </select>
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            <tr class="text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                <th rowspan="2" class="border py-4">{{ __('Date') }}</th>
                                <th colspan="3" class="border bg-white py-4">{{ __('Daily') }}</th>
                                <th colspan="3" class="border bg-white py-4">{{ __('Cumulative') }}</th>
                                <th colspan="3" class="border bg-white py-4">{{ __('Vaccination') }}</th>
                                <th rowspan="2" class="border py-4">{{ __('Pending') }}</th>
                            </tr>
                            <tr class="border text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                <th class="py-4">{{ __('Partial') }}</th>
                                <th class="py-4">{{ __('Full') }}</th>
                                <th class="border-r py-4">{{ __('Booster') }}</th>
                                <th class="py-4">{{ __('Partial') }}</th>
                                <th class="py-4">{{ __('Full') }}</th>
                                <th class="border-r py-4">{{ __('Booster') }}</th>
                                <th class="py-4">{{ __('Partial') }}</th>
                                <th class="py-4">{{ __('Full') }}</th>
                                <th class="border-r py-4">{{ __('Booster') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($vaxs as $vax)
                                <tr class="@if ($loop->even) bg-gray-50 @endif">
                                    <td class="whitespace-nowrap border py-4">
                                        {{ $vax->date->format('d M Y') }}
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold text-green-800">
                                            A : {{ number_format($vax->daily_adult) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-semibold text-yellow-800">
                                            T : {{ number_format($vax->daily_partial_adol) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-semibold text-indigo-800">
                                            C : {{ number_format($vax->daily_partial_child) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            A : {{ number_format($vax->daily_full_adult) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">
                                            T : {{ number_format($vax->daily_full_adol) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-semibold leading-5 text-indigo-800">
                                            C : {{ number_format($vax->daily_full_child) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap border-r py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            {{ __('All') }} : {{ number_format($vax->daily_booster) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            A : {{ number_format($vax->cumul_partial_adult) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">
                                            T : {{ number_format($vax->cumul_partial_adol) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-semibold leading-5 text-indigo-800">
                                            C : {{ number_format($vax->cumul_partial_child) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            A : {{ number_format($vax->cumul_full_adult) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">
                                            T : {{ number_format($vax->cumul_full_adol) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-semibold leading-5 text-indigo-800">
                                            C : {{ number_format($vax->cumul_full_child) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap border-r py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            {{ __('All') }} : {{ number_format($vax->cumul_booster) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            Pf : {{ number_format($vax->pfizer1) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">
                                            Sv : {{ number_format($vax->sinovac1) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-violet-100 px-2 text-xs font-semibold leading-5 text-violet-800">
                                            Az : {{ number_format($vax->astra1) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-semibold leading-5 text-indigo-800">
                                            Sp : {{ number_format($vax->sinopharm1) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            Pf : {{ number_format($vax->pfizer2) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">
                                            Sv : {{ number_format($vax->sinovac2) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-violet-100 px-2 text-xs font-semibold leading-5 text-violet-800">
                                            Az : {{ number_format($vax->astra2) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-semibold leading-5 text-indigo-800">
                                            Sp : {{ number_format($vax->sinopharm2) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-pink-100 px-2 text-xs font-semibold leading-5 text-pink-800">
                                            Cs : {{ number_format($vax->cansino) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap border-r py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            Pf : {{ number_format($vax->pfizer3) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">
                                            Sv : {{ number_format($vax->sinovac3) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-violet-100 px-2 text-xs font-semibold leading-5 text-violet-800">
                                            Az : {{ number_format($vax->astra3) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-semibold leading-5 text-indigo-800">
                                            Sp : {{ number_format($vax->sinopharm3) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-pink-100 px-2 text-xs font-semibold leading-5 text-pink-800">
                                            Cs : {{ number_format($vax->cansino3) }}
                                        </span>
                                    </td>
                                    <td class="space-y-1 whitespace-nowrap py-4">
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            {{ __('Partial') }} : {{ number_format($vax->pending1) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">
                                            {{ __('Full') }} : {{ number_format($vax->pending2) }}
                                        </span>
                                        <span
                                            class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-semibold leading-5 text-indigo-800">
                                            {{ __('Booster') }} : {{ number_format($vax->pending3) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border font-bold">{{ __('Total') }}</td>
                                <td class="space-y-1 whitespace-nowrap py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold text-green-800">
                                        A : {{ number_format($vaxs->sum('daily_adult')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-bold text-yellow-800">
                                        T : {{ number_format($vaxs->sum('daily_partial_adol')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-bold text-indigo-800">
                                        C : {{ number_format($vaxs->sum('daily_partial_child')) }}
                                    </span>
                                </td>
                                <td class="space-y-1 whitespace-nowrap py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        A : {{ number_format($vaxs->sum('daily_full_adult')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-bold leading-5 text-yellow-800">
                                        T : {{ number_format($vaxs->sum('daily_full_adol')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-bold leading-5 text-indigo-800">
                                        C : {{ number_format($vaxs->sum('daily_full_child')) }}
                                    </span>
                                </td>
                                <td class="space-y-1 whitespace-nowrap border-r py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        {{ __('All') }} : {{ number_format($vaxs->sum('daily_booster')) }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        A : {{ number_format($vaxs->sum('cumul_partial_adult')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-bold leading-5 text-yellow-800">
                                        T : {{ number_format($vaxs->sum('cumul_partial_adol')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-bold leading-5 text-indigo-800">
                                        C : {{ number_format($vaxs->sum('cumul_partial_child')) }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        A : {{ number_format($vaxs->sum('cumul_full_adult')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-bold leading-5 text-yellow-800">
                                        T : {{ number_format($vaxs->sum('cumul_full_adol')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-bold leading-5 text-indigo-800">
                                        C : {{ number_format($vaxs->sum('cumul_full_child')) }}
                                    </span>
                                </td>
                                <td class="space-y-1 whitespace-nowrap border-r py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        All : {{ number_format($vaxs->sum('cumul_booster')) }}
                                    </span>
                                </td>
                                <td class="space-y-1 whitespace-nowrap py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        Pf : {{ number_format($vaxs->sum('pfizer1')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-bold leading-5 text-yellow-800">
                                        Sv : {{ number_format($vaxs->sum('sinovac1')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-violet-100 px-2 text-xs font-bold leading-5 text-violet-800">
                                        Az : {{ number_format($vaxs->sum('astra1')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-bold leading-5 text-indigo-800">
                                        Sp : {{ number_format($vaxs->sum('sinopharm1')) }}
                                    </span>
                                </td>
                                <td class="space-y-1 whitespace-nowrap py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        Pf : {{ number_format($vaxs->sum('pfizer2')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-bold leading-5 text-yellow-800">
                                        Sv : {{ number_format($vaxs->sum('sinovac2')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-violet-100 px-2 text-xs font-bold leading-5 text-violet-800">
                                        Az : {{ number_format($vaxs->sum('astra2')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-bold leading-5 text-indigo-800">
                                        Sp : {{ number_format($vaxs->sum('sinopharm2')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-pink-100 px-2 text-xs font-bold leading-5 text-pink-800">
                                        Cs : {{ number_format($vaxs->sum('cansino')) }}
                                    </span>
                                </td>
                                <td class="space-y-1 whitespace-nowrap border-r py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        Pf : {{ number_format($vaxs->sum('pfizer3')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-bold leading-5 text-yellow-800">
                                        Sv : {{ number_format($vaxs->sum('sinovac3')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-violet-100 px-2 text-xs font-bold leading-5 text-violet-800">
                                        Az : {{ number_format($vaxs->sum('astra3')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-bold leading-5 text-indigo-800">
                                        Sp : {{ number_format($vaxs->sum('sinopharm3')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-pink-100 px-2 text-xs font-bold leading-5 text-pink-800">
                                        Cs : {{ number_format($vaxs->sum('cansino3')) }}
                                    </span>
                                </td>
                                <td class="space-y-1 whitespace-nowrap py-4">
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-green-100 px-2 text-xs font-bold leading-5 text-green-800">
                                        {{ __('Partial') }} : {{ number_format($vaxs->sum('pending1')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-yellow-100 px-2 text-xs font-bold leading-5 text-yellow-800">
                                        {{ __('Full') }} : {{ number_format($vaxs->sum('pending2')) }}
                                    </span>
                                    <span
                                        class="mx-auto flex w-min rounded-full bg-indigo-100 px-2 text-xs font-bold leading-5 text-indigo-800">
                                        {{ __('Booster') }} : {{ number_format($vaxs->sum('pending3')) }}
                                    </span>
                                </td>
                            </tr>
                        <tfoot>
                            <tr class="bg-white">
                                <td></td>
                                <td class="whitespace-nowrap border px-6 py-4 text-left" colspan="6">
                                    <p class="inline break-words text-sm font-medium text-gray-900">
                                        <span class="text-black">* </span>{{ __('A: Adult') }}
                                    </p>
                                    <p class="inline break-words text-sm font-medium text-gray-900">
                                        {{ __('T: Teenager') }}
                                    </p>
                                    <p class="inline break-words text-sm font-medium text-gray-900">
                                        {{ __('C: Child') }}
                                    </p>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-left" colspan="3">
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
                                <td colspan="3">

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-2 flex flex-col" id="vax-reg-data">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="13" class="border-b py-2">
                                    <a href="#vax-reg-data">
                                        <h3 class="text-2xl font-bold uppercase">
                                            {{ __('Vaccination Registration Data') }}</h3>
                                    </a>

                                </th>
                            </tr>
                            <tr>
                                <th colspan="13" class="bg-white py-2">
                                    <div class="sm:flex sm:flex-row-reverse">
                                        <label>
                                            <span
                                                class="inline-flex text-sm font-medium leading-5 text-gray-700">{{ __('Filter by') }}</span>
                                            <select wire:model.live="regDaysToShow" class="rounded-lg">
                                                <option value="7">{{ __('Last 7 days') }}</option>
                                                <option value="14">{{ __('Last 14 days') }}</option>
                                                <option value="30">{{ __('Last 30 days') }}</option>
                                                <option value="60">{{ __('Last 60 days') }}</option>
                                                <option value="90">{{ __('Last 90 days') }}</option>
                                                <option value="180">{{ __('Last 180 days') }}</option>
                                            </select>
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            <tr class="space-x-2 border-t text-center text-xs font-medium uppercase text-gray-500">
                                <th class="border py-4">{{ __('Date') }}</th>
                                <th class="py-4">{{ __('Total') }}</th>
                                <th class="py-4">{{ __('Phase 2') }}</th>
                                <th class="py-4">{{ __('MySej') }}</th>
                                <th class="py-4">{{ __('Call') }}</th>
                                <th class="py-4">{{ __('Web') }}</th>
                                <th class="py-4">{{ __('Children') }}</th>
                                <th class="py-4">{{ __('Elderly') }}</th>
                                <th class="py-4">{{ __('Comorbidity') }}</th>
                                <th class="py-4">{{ __('OKU') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($regs as $reg)
                                <tr class="@if ($loop->even) bg-gray-50 @endif">
                                    <td class="whitespace-nowrap border py-4">{{ $reg->date->format('d M Y') }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->total) }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->phase2) }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->mysj) }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->call) }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->web) }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->children) }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->elderly) }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->comorb) }}</td>
                                    <td class="whitespace-nowrap py-4">{{ number_format($reg->oku) }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
