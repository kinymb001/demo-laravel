<th wire:click="sortBy('{{ $data }}')">
    @if ($sortBy === $data)
        @if ($sortAscending)
            {{ $value }} <i class="float-end fas fa-sort-up"></i>
        @else
            {{ $value }} <i class="float-end fas fa-sort-down"></i>
        @endif
    @else
        {{ $value }} <i class="float-end fas fa-sort"></i>
    @endif
</th>
