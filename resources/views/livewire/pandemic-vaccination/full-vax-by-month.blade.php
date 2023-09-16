<div wire:init="load" wire:loading.class="animate-pulse">
    <div class="mt-2 flex flex-col" id="full-vax-by-month">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="18" class="border-b bg-white py-2">
                                    <a href="#full-vax-by-month">
                                        <h3 class="text-2xl font-bold uppercase">
                                            {{ __('Vaccinated Person By State and Month') }}</h3>
                                    </a>
                                </th>
                            </tr>
                            <tr class="text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                <th class="border-r border-gray-200 bg-gray-50 px-6 py-3">{{ __('State') }}</th>

                                @foreach ($vaxs->take(1) as $key => $vax)
                                    @foreach ($vax as $k => $v)
                                        <th class="px-2 py-2">{{ __($k) }}</th>
                                    @endforeach
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($vaxs as $key => $vax)
                                <tr class="@if ($loop->even) bg-gray-50 @endif">
                                    <td class="whitespace-nowrap border-r py-4 px-1 text-sm">
                                        {{ $key }}
                                    </td>
                                    @foreach ($vax as $state => $v)
                                        <td class="whitespace-nowrap py-4 px-1 text-sm">{{ number_format($v) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
