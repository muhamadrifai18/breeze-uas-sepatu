@extends('sneat.layouts.app')

@section('title', __('Orders'))

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
                <h5 class="mb-0">{{ __('Order List') }}</h5>
                
                <div class="d-flex align-items-center gap-2">
                    <form action="{{ route('orders.index') }}" method="GET" class="d-flex align-items-center">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="Search orders..." value="{{ request('search') }}" />
                            @if(request('search'))
                                <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                                    <i class="bx bx-x"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                    
                    <a href="{{ route('orders.create') }}" class="btn btn-primary text-nowrap">
                        <span class="tf-icons bx bx-plus"></span>&nbsp; {{ __('Add Order') }}
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Order Number') }}</th>
                            <th>{{ __('Customer') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th class="text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($orders as $order)
                            <tr>
                                <td><strong>{{ $order->order_number }}</strong></td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td>
                                    @php
                                        $statusClass = match($order->status) {
                                            'completed' => 'bg-label-success',
                                            'pending' => 'bg-label-warning',
                                            'cancelled' => 'bg-label-danger',
                                            default => 'bg-label-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $statusClass }} text-capitalize">{{ $order->status }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('orders.show', $order) }}">
                                                <i class="bx bx-show me-1"></i> {{ __('View Details') }}
                                            </a>
                                            <form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirmDelete(this, '{{ __('Are you sure you want to delete this order?') }}');">
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
                                <td colspan="6" class="text-center text-muted py-4">
                                    {{ __('No orders found.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($orders->hasPages())
                <div class="card-footer px-3 py-2">
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
