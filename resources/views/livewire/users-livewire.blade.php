<div class="card-body">
    <div class="flex flex-between">
        <div>
            <a href="#" class="btn btn-outline-primary" type="button"
                data-tippy-content="{{ __('messages.users.add') }}">
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
            <a href="{{ route('exportUsers') }}" class="btn btn-outline-success" type="button" id="excel"
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
        <div class="d-flex">
            <select class="form-control me-2" wire:model="selectedRole">
                <option value="">All (roles)</option>
                @foreach (Spatie\Permission\Models\Role::all() as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>

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
                    <x-th value="Image" data="avatar" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Name" data="name" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Email" data="email" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Role" data="email" :sortBy="$sortBy" :sortAscending="$sortAscending" />
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
                            <td>
                                @if ($value->avatar)
                                    <img style="width: 100px; height: 100px;" class="img-fluid img-thumbnail lazyload"
                                        src="{{ asset('assets/images/users/' . $value->avatar) }}"
                                        alt="{{ $value->name }}"
                                        data-src="{{ asset('assets/images/users/' . $value->avatar) }}">
                                @else
                                    <img style="width: 100px; height: 100px;" class="img-fluid img-thumbnail lazyload"
                                        src="{{ asset('assets/images/users/avatar.png') }}" alt="{{ $value->name }}"
                                        data-src="{{ asset('assets/images/users/avatar.png') }}">
                                @endif
                            </td>
                            <th>{{ $value->name }}</th>
                            <th>{{ $value->email }}</th>
                            <th>
                                <div class="role">
                                    @foreach ($value->roles as $role)
                                        <span class="badge badge-info right" data-id="{{ $value->id }}">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </th>
                            <td class="text-center">
                                <div>
                                    @can('role-create')
                                        <a class="btn btn-success" href="{{ route('users.show', $value->id) }}"
                                            data-tippy-content="{{ __('messages.detail') }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('role-edit')
                                        <a class="btn btn-warning" href="{{ route('users.edit', $value->id) }}"
                                            data-tippy-content="{{ __('messages.edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('role-delete')
                                        <form action="{{ route('users.destroy', $value->id) }}" class="d-inline delete"
                                            method="POST">
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
        <x-modal_reset_confirm url="{{ route('resetUsers') }}" />

    </div>

</div>
