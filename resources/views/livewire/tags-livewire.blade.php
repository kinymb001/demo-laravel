<div class="card-body">
    <div class="flex flex-between">
        <div>
            <a href="{{ route('tags.create') }}" class="btn btn-outline-primary" type="button"
                data-tippy-content="{{ __('messages.tags.add') }}">
                <i class="fas fa-plus"></i>
            </a>
            <button wire:click="load()" class="btn btn-outline-success-1" type="button" id="reload_table"
                data-tippy-content="{{ __('messages.reload') }}">
                <i class="fas fa-undo"></i>
            </button>
            @can('role-delete')
                <button class="btn btn-outline-danger" type="button" data-toggle="modal" data-target="#modal_confirm"
                    data-tippy-content="{{ __('messages.delete_select') }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            @endcan
            <a href="{{ route('exportTags') }}" class="btn btn-outline-success" type="button" id="excel"
                data-tippy-content="{{ __('messages.export_excel') }}">
                <i class="fas fa-table"></i>
            </a>
            @can('role-delete')
                <button class="btn btn-outline-warning" type="button" data-toggle="modal"
                    data-target="#modal_reset_confirm" data-tippy-content="{{ __('messages.reset_table') }}">
                    <i class="fas fa-ban"></i>
                </button>
            @endcan
            <div wire:loading>
                Loading...
            </div>
        </div>
        <div>
            <form class="p-r" wire:submit.prevent="submitForm" autocomplete="off" id="search">
                <input class="form-control-search" wire:model.300ms="name" type="text" placeholder="search by name"
                    name="name">
                <button type="submit" class="btn btn-primary-1 btn-search-ad">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <x-alert />
    
    <div class="table-responsive">
        <table class="mt-3 mb-3 table table-hover table-border">
            <thead>
                <tr>
                    <th>
                        *
                    </th>
                    <x-th value="Name" data="name" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Slug" data="slug" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Articles" data="articles_count" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Created_at" data="created_at" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) == 0)
                    <tr>
                        <td colspan="6" class="text-center bg-info">
                            No results found ...
                        </td>
                    </tr>
                @else
                    @foreach ($data as $value)
                        <tr wire:key="item-{{ $value->id }}">
                            <td>
                                <input wire:model="selectedIds" class="item-id" type="checkbox"
                                    data-id="{{ $value->id }}" value="{{ $value->id }}" />
                            </td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>{{ $value->articles_count }}</td>
                            <td>{{ date_format($value->created_at, 'H:i:s d/m/Y') }}</td>
                            <td>
                                <div class="text-center">
                                    @can('role-create')
                                        <a class="btn btn-success" href="{{ route('tags.show', $value->id) }}"
                                            data-tippy-content="{{ __('messages.detail') }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('role-edit')
                                        <a class="btn btn-warning" href="{{ route('tags.edit', $value->id) }}"
                                            data-tippy-content="{{ __('messages.edit', ['name' => $value->name]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('role-delete')
                                        <form action="{{ route('tags.destroy', $value->id) }}"
                                            data-tippy-content="{{ __('messages.delete', ['name' => $value->name]) }}"
                                            class="d-inline delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="pagelist">{!! $data->links() !!}</div>

        <x-modal_confirm />
        <x-modal_reset_confirm url="{{ route('resetTags') }}" />

    </div>

</div>
