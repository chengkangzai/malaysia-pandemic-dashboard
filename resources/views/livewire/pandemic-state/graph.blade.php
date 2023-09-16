<div xmlns:wire="http://www.w3.org/1999/xhtml" wire:loading.class="animate-pulse">
    <div class="mb-2">
        <section class="my-2 rounded-2xl bg-gray-50 py-8 shadow dark:bg-white dark:text-black" id="graph-state">
            <a href="#graph-state">
                <h1 class="px-2 py-2 text-2xl font-bold sm:text-5xl">{{ __('Statistical Graph of :') }}
                    {{ __($state) }}</h1>
            </a>
            <div class="container space-y-2 sm:flex sm:flex-row-reverse sm:space-y-0">
                <div>
                    <label>
                        {{ __('Filter By') }} :
                        <select class="mx-2 rounded bg-white px-4 py-1 ring ring-gray-200" wire:model.live="state">
                            <option disabled>-----</option>
                            @foreach (\App\Models\CasesState::STATE as $key => $filter)
                                <option value="{{ $key }}">
                                    {{ __($key) }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                </div>

                {{--                <div> --}}
                {{--                    <label> --}}
                {{--                        {{ __('Filter By') }} : --}}
                {{--                        <select class="mx-2 rounded bg-white px-4 py-1 ring ring-gray-200" wire:model.live="filter"> --}}
                {{--                            <option disabled>-----</option> --}}
                {{--                            @foreach (\App\Http\Services\Covid\Graph\CovidStateGraphService::FILTER as $filter) --}}
                {{--                                <option value="{{ $filter }}"> --}}
                {{--                                    {{ __($filter) }} --}}
                {{--                                </option> --}}
                {{--                            @endforeach --}}
                {{--                        </select> --}}
                {{--                    </label> --}}
                {{--                </div> --}}
            </div>

        </section>

        <div class="gap-2 space-y-2 sm:mt-2 sm:grid sm:grid-cols-2 sm:space-y-0">
            <div class="rounded-xl bg-gray-50 p-4 shadow">
                <livewire:pandemic-state.graph.case-per-day :date="$date" :confirmCase="$confirmCase" :recoveredCase="$recoveredCase" />
            </div>

            <div class="rounded-xl bg-gray-50 p-4 shadow">
                <livewire:pandemic-state.graph.death-per-day :date="$date" :deathCase="$deathCase" :bidCase="$bidCase"
                    :dodCase="$dodCase" />
            </div>

            <div class="rounded-xl bg-gray-50 p-4 shadow">
                <livewire:pandemic-state.graph.active-case-vs-health-care :date="$date" :activeCase="$activeCase"
                    :cat1="$cat1" :cat2="$cat2" :cat3="$cat3" :cat4="$cat4" :cat5="$cat5" />
            </div>

            <div class="rounded-xl bg-gray-50 p-4 shadow">
                <livewire:pandemic-state.graph.active-case-percentage :date="$date" :activeCase="$activeCase"
                    :cumRecoveredCase="$cumRecoveredCase" :cumDeathCase="$cumDeathCase" />
            </div>
        </div>
    </div>


</div>
