<div class="container min-h-screen">
    <div class="my-2 w-full rounded-2xl rounded-2xl bg-gray-50 py-4 px-4 shadow dark:bg-white">
        <div class="pb-2">
            <label class="w-full text-left">
                <span>{{ __('Search any input') }}</span>
                <input type="text" class="mx-12 rounded-xl border border-blue-300 px-8 py-2"
                    wire:model.live.debounce.500ms="search" placeholder="{{ __('Search by any keyword') }}">
            </label>
        </div>
        <div class="pb-2">
            <label class="w-full text-left">
                <span>{{ __('Filter By Cluster Category') }}</span>
                <select wire:model.live="categoryFilter" class="mx-8 rounded-xl border border-blue-300 px-12 py-2">
                    <option value="" selected>{{ __('All') }}</option>
                    <option value="" disabled>--------</option>
                    @foreach (\App\Models\Cluster::CLUSTER_CATEGORY as $key => $category)
                        <option value="{{ $key }}">{{ __($category) }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="pb-2">
            <label class="w-full text-left">
                <span>{{ __('Filter By State') }}</span>
                <select wire:model.live="state" class="mx-8 rounded-xl border border-blue-300 px-12 py-2">
                    <option value="" selected>{{ __('All') }}</option>
                    <option value="" disabled>--------</option>
                    @foreach (\App\Models\Cluster::STATE as $key => $state)
                        <option value="{{ $key }}">{{ __($state) }}</option>
                    @endforeach
                </select>
            </label>
        </div>

    </div>

    <section class="mt-8 mb-8 flex flex-col" id="healthcare-state">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="10" class="border-b py-2">
                                    <a href="#healthcare-state">
                                        <h3 class="text-2xl font-bold uppercase">{{ __('Active Cluster') }}</h3>
                                    </a>
                                    <span class="float-right inline text-xs font-normal">{{ __('Updated at') }}
                                        {{ $updated_at }}
                                </th>
                            </tr>
                            <tr>
                                <th scope="col"
                                    class="border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                    {{ __('Cluster Name') }}
                                </th>
                                <th scope="col"
                                    class="border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                    {{ __('State') }}
                                </th>
                                <th scope="col"
                                    class="border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                    {{ __('District') }}
                                </th>
                                <th scope="col"
                                    class="border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500">
                                    {{ __('Cluster Category') }}
                                </th>
                                <th scope="col" wire:click="sort('cases_new')"
                                    class="cursor-pointer border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500 hover:font-bold hover:text-blue-500">
                                    {{ __('New Case') }}
                                </th>
                                <th scope="col" wire:click="sort('cases_active')"
                                    class="cursor-pointer border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500 hover:font-bold hover:text-blue-500">
                                    {{ __('Active Case') }}
                                </th>
                                <th scope="col" wire:click="sort('cases_total')"
                                    class="cursor-pointer border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500 hover:font-bold hover:text-blue-500">
                                    {{ __('Total Case') }}
                                </th>
                                <th scope="col" wire:click="sort('positiveRate')"
                                    class="cursor-pointer border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500 hover:font-bold hover:text-blue-500">
                                    {{ __('Positive Rate') }}
                                </th>
                                <th scope="col" wire:click="sort('date_announced')"
                                    class="cursor-pointer border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500 hover:font-bold hover:text-blue-500">
                                    {{ __('Announced Date') }}
                                </th>
                                <th scope="col" wire:click="sort('date_last_onset')"
                                    class="cursor-pointer border-r px-2 py-4 text-center text-xs font-medium uppercase tracking-wider text-gray-500 hover:font-bold hover:text-blue-500">
                                    {{ __('Last Active Date') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($clusters as $cluster)
                                <tr class="@if ($loop->even) bg-gray-50 @endif">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ str_replace('Kluster', 'K.', $cluster->cluster) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="whitespace-nowrap border-r border-l px-6 py-4 text-left">
                                        @if (count(explode(',', $cluster->state)) == 1)
                                            {{ __($cluster->state) }}
                                        @else
                                            <ul class="list-inside list-disc">
                                                @foreach (explode(',', $cluster->state) as $state)
                                                    <li>{{ __($state) }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap border-r px-6 py-4 text-left">
                                        @if (count(explode(',', $cluster->district)) == 1)
                                            {{ $cluster->district }}
                                        @else
                                            <ul class="list-inside list-disc">
                                                @foreach (explode(',', $cluster->district) as $district)
                                                    <li>{{ $district }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap border-r py-4">
                                        {{ __(\App\Models\Cluster::CLUSTER_CATEGORY[$cluster->category]) }}
                                    </td>
                                    <td class="whitespace-nowrap border-r py-4">
                                        {{ $cluster->cases_new }}
                                    </td>
                                    <td class="whitespace-nowrap border-r py-4">
                                        {{ $cluster->cases_active }}
                                    </td>
                                    <td class="whitespace-nowrap border-r py-4">
                                        {{ $cluster->cases_total }}
                                    </td>
                                    <td class="whitespace-nowrap border-r py-4">
                                        {{ number_format(($cluster->cases_total / $cluster->tests) * 100, 2) . '%' }}
                                        <small class="text-xs">
                                            ({{ $cluster->cases_total }}/{{ $cluster->tests }})
                                        </small>
                                    </td>
                                    <td class="whitespace-nowrap border-r py-4">
                                        {{ $cluster->date_announced->format('d/m/y') }}
                                    </td>
                                    <td class="whitespace-nowrap border-r py-4">
                                        {{ $cluster->date_last_onset->format('d/m/y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="whitespace-nowrap border-r py-4">
                                        {{ __('No Data') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10" class="bg-white py-2 px-2">
                                    {{ $clusters->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
