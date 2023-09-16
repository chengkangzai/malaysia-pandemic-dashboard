<section class="mt-2 flex flex-col" id="case-state" xmlns:wire="" wire:loading.class="animate-pulse">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th colspan="7" class="border-b py-2">
                                <a href="#case-state">
                                    <h3 class="text-2xl font-bold uppercase">{{ __('Cases per States') }}</h3>
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
                                {{ __('New Case') }}
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Cumulative Case') }} ({{ __('% per population') }})
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Active Case') }}
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('New Death') }}
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Cumulative Death') }} ({{ __('Fatality rate') }})
                            </th>
                            <th scope="col"
                                class="py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Tested') }}* ({{ __('Positive Rate') }})
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($newCase as $state => $n)
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
                                    {{ number_format($newCase[$state]) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($cumCase[$state]) }}
                                    <small class="text-xs">
                                        {{ '(' . number_format($cumCasePercentage[$state], 2) . '%)' }}
                                    </small>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($activeCase[$state]) }}
                                    <small class="text-xs">
                                        {{ '(' . number_format($activeCasePercentage[$state], 2) . '%)' }}
                                    </small>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($newDeath[$state]) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($cumDeath[$state]) }}
                                    <small class="text-xs">
                                        {{ '(' . number_format($fatalityRate[$state], 2) . '%)' }}
                                    </small>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ number_format($tests[$state]) }}
                                    <small
                                        class="@if ($positiveRate[$state] > 10) text-red-700 @elseif($positiveRate[$state] > 5) text-yellow-700 @endif text-xs">
                                        {{ '(' . number_format($positiveRate[$state], 2) . '%)' }}
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
                                {{ number_format($newCase->sum()) }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($cumCase->sum()) }}
                                <small class="text-xs">
                                    {{ '(' . number_format($cumCasePercentage->avg(), 2) . '%)' }}
                                </small>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($activeCase->sum()) }}
                                <small class="text-xs">
                                    {{ '(' . number_format($activeCasePercentage->avg(), 2) . '%)' }}
                                </small>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($newDeath->sum()) }}
                                <small class="text-xs">
                                </small>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($cumDeath->sum()) }}
                                <small class="text-xs">
                                    {{ '(' . number_format($fatalityRate->avg(), 2) . '%)' }}
                                </small>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-bold">
                                {{ number_format($tests->sum()) }}
                                <small class="text-xs">
                                    {{ '(' . number_format($positiveRate->avg()) . '%)' }}
                                </small>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-white">
                            <td class="whitespace-nowrap px-6 py-4 text-left" colspan="7">
                                <div class="flex max-w-full">
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">
                                            <span class="text-black">*</span>
                                            {{ __('Not necessarily unique individuals') }},
                                            {{ __('Updated at') }} {{ $positiveRate_updated_at }}
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
