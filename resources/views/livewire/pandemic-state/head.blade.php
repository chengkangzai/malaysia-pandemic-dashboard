<section class="mt-2 rounded-2xl bg-gray-50 py-8 shadow dark:bg-white dark:text-black" id="malaysia-dashboard"
    wire:loading.class="animate-pulse" xmlns:wire="http://www.w3.org/1999/xhtml">
    <a href="#malaysia-dashboard">
        <h1 class="px-2 text-2xl font-bold sm:text-5xl">{{ __('Covid-19 Dashboard') }} : {{ __($state) }}</h1>
    </a>
    <div class="container space-y-2 sm:flex sm:flex-row-reverse sm:space-y-0">
        <label>
            {{ __('Filter By') }} :
            <select class="mx-2 rounded bg-white ring ring-gray-200" wire:model.live="state">
                <option disabled>-----</option>
                @foreach (\App\Models\CasesState::STATE as $key => $filter)
                    <option value="{{ $key }}">
                        {{ __($key) }}
                    </option>
                @endforeach
            </select>
        </label>
        <label>
            <select class="mx-2 rounded bg-white ring ring-gray-200" wire:model.live="popFilter">
                @foreach (\App\Models\Population::POP_FILTER as $key => $filter)
                    <option value="{{ $key }}">
                        {{ __($key) }}
                    </option>
                @endforeach
            </select>
        </label>
        <span class="py-1">{{ __('Filter By') }} : </span>
    </div>
</section>
