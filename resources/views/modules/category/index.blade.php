@extends('sneat.layouts.app')

@section('title', __('Categories'))

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <h5 class="mb-0">{{ __('Categories List') }}</h5>
                
                <div class="d-flex align-items-center gap-2">
                    <form action="{{ route('categories.index') }}" method="GET" class="d-flex align-items-center">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="Search categories..." value="{{ request('search') }}" />
                            @if(request('search'))
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                                    <i class="bx bx-x"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                    
                    <a href="{{ route('categories.create') }}" class="btn btn-primary text-nowrap">
                        <span class="tf-icons bx bx-plus"></span>&nbsp; {{ __('Add New') }}
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th class="text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($categories as $category)
                            <tr>
                                <td><strong>{{ $category->name }}</strong></td>
                                <td>{{ $category->created_at->format('M d, Y') }}</td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('categories.edit', $category) }}">
                                                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirmDelete(this, '{{ __('Are you sure you want to delete this category?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="bx bx-trash me-1"></i> {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted italic">
                                    {{ __('No categories found.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($categories->hasPages())
                <div class="card-footer px-3 py-2">
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
