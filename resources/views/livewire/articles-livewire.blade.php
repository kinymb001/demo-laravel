<div class="card-body">
    <div class="flex flex-between">
        <div>
            <a href="{{ route('articles.create') }}" class="btn btn-outline-primary" type="button"
                data-tippy-content="{{ __('messages.articles.add') }}">
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
            <a href="{{ route('exportArticles') }}" class="btn btn-outline-success" type="button" id="excel"
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
            <span wire:ignore>
                <select class="form-control me-2 select2-ajax-tags" name="tag" wire:model="selectedTag"
                    id="tag_search" data-url="{{ route('tags.search') }}" wire:click="$emit('postAdded')">
                    <option value="">All (tags)</option>
                </select>
            </span>
            <select class="form-control me-2 ms-2" wire:model="selectedCategory">
                <option value="">All (categories)</option>
                @foreach (App\Models\Category::all() as $value)
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
                    <x-th value="Image" data="{{ $table }}image" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Title" data="{{ $table }}name" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="User" data="users.name" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Category" data="categories.name" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="View" data="{{ $table }}view" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <x-th value="Check" data="{{ $table }}checked" :sortBy="$sortBy" :sortAscending="$sortAscending" />
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) == 0)
                    <tr>
                        <td colspan="8" class="text-center bg-info">
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
                                <img style="width: 100px; height: 100px;" class="img-fluid img-thumbnail lazyload"
                                    src="{{ asset('assets/images/articles/' . $value->image) }}"
                                    alt="{{ $value->name }}"
                                    data-src="{{ asset('assets/images/articles/' . $value->image) }}">
                            </td>
                            <td style="width: 300px;">{{ $value->name }}</td>
                            <td>
                                <a href='{{ route('users.show', ['user' => $value->user->id]) }}'
                                    data-tippy-content="{{ $value->user->email }}">
                                    {{ $value->user->name }}
                                </a>
                            </td>
                            <td>
                                <a href='{{ route('categories.show', ['category' => $value->category->id]) }}'
                                    data-tippy-content="{{ $value->category->slug }}">
                                    {{ $value->category->name }}
                                </a>
                            </td>
                            <td>{{ $value->view }}</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" wire:click.300ms="isChecked({{ $value->id }})"
                                        class="custom-control-input" id="customSwitch{{ $value->id }}"
                                        @if ($value->checked) {{ 'checked' }} @endif>
                                    <label class="custom-control-label" for="customSwitch{{ $value->id }}"></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <div>
                                    @can('role-create')
                                        <a class="btn btn-success" href="{{ route('articles.show', $value->id) }}"
                                            data-tippy-content="{{ __('messages.detail') }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('role-edit')
                                        <a class="btn btn-warning" href="{{ route('articles.edit', $value->id) }}"
                                            data-tippy-content="{{ __('messages.edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('role-delete')
                                        <form action="{{ route('articles.destroy', $value->id) }}"
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
        <x-modal_reset_confirm url="{{ route('resetArticles') }}" />

    </div>

</div>
