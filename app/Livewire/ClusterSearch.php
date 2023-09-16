<?php

namespace App\Livewire;

use App\Models\Cluster;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ClusterSearch extends Component
{
    use WithPagination;

    public string $search = '';

    public string $sort = '';

    public string $sortDirection = 'asc';

    public string $updated_at;

    /**
     * For Searching purpose
     */
    public string $categoryFilter = '';

    public string $state = '';

    public function mount(): void
    {
        $this->updated_at = cache()->remember('cluster', 60, fn () => Cluster::orderByDesc('id')->first())->updated_at;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function sort($filterBy): string
    {
        /**
         * Set Ascending or Descending
         */
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        if ($filterBy == 'positiveRate') {
            return $this->sort = 'cases_total / tests';
        }

        return $this->sort = $filterBy;
    }

    public function render(): View
    {
        return view('livewire.cluster-search', [
            'clusters' => Cluster::query()
                ->when($this->search, function ($query) {
                    return $query
                        ->orWhere('state', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('cluster', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('district', 'LIKE', '%'.$this->search.'%');
                })
                ->when($this->sort, function ($query) {
                    return $query->orderBy(DB::raw($this->sort), $this->sortDirection);
                })
                ->when($this->categoryFilter, function ($query) {
                    return $query->where('category', $this->categoryFilter);
                })
                ->when($this->state, function ($query) {
                    return $query->where('state', $this->state);
                })
                ->where('status', '=', 'active')
                ->paginate(),
        ]);
    }
}
