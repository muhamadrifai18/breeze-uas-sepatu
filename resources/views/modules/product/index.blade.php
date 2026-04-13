@extends('sneat.layouts.app')

@section('title', __('Products'))

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
                <h5 class="mb-0">{{ __('Products List') }}</h5>
                
                <div class="d-flex align-items-center gap-2">
                    <form action="{{ route('products.index') }}" method="GET" class="d-flex align-items-center">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}" />
                            @if(request('search'))
                                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                                    <i class="bx bx-x"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                    
                    <a href="{{ route('products.create') }}" class="btn btn-primary text-nowrap">
                        <span class="tf-icons bx bx-plus"></span>&nbsp; {{ __('Add New') }}
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Product Name') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th class="text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded" width="40" height="40" style="object-fit: cover;">
                                    @else
                                        <div class="avatar avatar-xs">
                                            <span class="avatar-initial rounded bg-label-secondary">
                                                <i class="bx bx-package"></i>
                                            </span>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $product->name }}</strong></td>
                                <td>{{ $product->category->name }}</td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('products.edit', $product) }}">
                                                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirmDelete(this, '{{ __('Are you sure you want to delete this product?') }}');">
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
                                <td colspan="4" class="text-center text-muted italic">
                                    {{ __('No products found.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($products->hasPages())
                <div class="card-footer px-3 py-2">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
