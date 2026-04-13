@extends('sneat.layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-12">
          <div class="card-body">
            <h5 class="card-title text-primary">Selamat datang di halaman Dashboard UTS PPWL {{ Auth::user()->name }}! 🎉</h5>
            <p class="mb-4">
              You are now using the <span class="fw-bold">Sneat</span> template for your main dashboard. Manage your categories and products efficiently using the sidebar navigation.
            </p>

            <div class="d-flex gap-2">
                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">Manage Categories</a>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary">Manage Products</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <div class="avatar-initial rounded bg-label-success">
                    <i class="bx bx-category-alt"></i>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Categories</span>
            <h3 class="card-title mb-2">{{ $categoryCount }}</h3>
            <small class="text-muted fw-semibold">Total record</small>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <div class="avatar-initial rounded bg-label-info">
                    <i class="bx bx-package"></i>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Products</span>
            <h3 class="card-title text-nowrap mb-1">{{ $productCount }}</h3>
            <small class="text-muted fw-semibold">Total record</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Products (E-commerce Style) -->
  <div class="col-lg-12 mb-4 order-2">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">{{ __('Recent Additions (Last 7 Days)') }}</h5>
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">View All Products</a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @forelse ($recentProducts as $product)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 product-card">
                    <div class="position-relative">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top rounded-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-label-secondary rounded-top" style="height: 200px;">
                                <i class="bx bx-package fs-1"></i>
                            </div>
                        @endif
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="card-title mb-0 fw-bold">{{ $product->name }}</h6>
                        </div>
                        <div class="mb-3">
                            <span class="badge bg-label-info small">{{ $product->category->name }}</span>
                        </div>
                        <p class="card-text text-muted small text-truncate-2">
                            {{ $product->description ?: 'No description available for this product.' }}
                        </p>
                    </div>
                    <div class="card-footer border-0 pt-0 bg-transparent pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-icon btn-outline-primary">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card p-5 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bx bx-shopping-bag fs-1 text-muted mb-3"></i>
                        <h5>No New Products</h5>
                        <p class="text-muted">You haven't added any products in the last 7 days.</p>
                        <a href="{{ route('products.create') }}" class="btn btn-primary mt-2">Add First Product</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
  </div>
</div>

<style>
    .product-card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
