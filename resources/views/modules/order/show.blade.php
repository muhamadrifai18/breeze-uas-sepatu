@extends('sneat.layouts.app')

@section('title', __('Order Details'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                <i class="bx bx-chevron-left"></i> {{ __('Back to List') }}
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Order') }} #{{ $order->order_number }}</h5>
                <div>
                    @php
                        $statusClass = match($order->status) {
                            'completed' => 'bg-label-success',
                            'pending' => 'bg-label-warning',
                            'cancelled' => 'bg-label-danger',
                            default => 'bg-label-secondary'
                        };
                    @endphp
                    <span class="badge {{ $statusClass }} text-capitalize fs-6">{{ $order->status }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-2">{{ __('Customer Information') }}:</h6>
                        <p class="mb-1 fw-bold">{{ $order->user->name }}</p>
                        <p class="mb-1 text-muted">{{ $order->user->email }}</p>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <h6 class="mb-2">{{ __('Order Date') }}:</h6>
                        <p class="mb-0 fw-bold">{{ $order->created_at->format('F d, Y H:i') }}</p>
                    </div>
                </div>

                <div class="table-responsive border rounded mb-4">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr class="table-light">
                                <th>{{ __('Product') }}</th>
                                <th class="text-center">{{ __('Qty') }}</th>
                                <th class="text-end">{{ __('Unit Price') }}</th>
                                <th class="text-end">{{ __('Subtotal') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->product->image)
                                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="rounded me-2" width="32" height="32" style="object-fit: cover;">
                                            @endif
                                            <div>
                                                <p class="mb-0 fw-semibold">{{ $item->product->name }}</p>
                                                <small class="text-muted">{{ $item->product->category->name }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                                    <td class="text-end fw-bold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border-top">
                                <td colspan="3" class="text-end fw-bold py-3 pt-4 fs-5">{{ __('Total Amount') }}</td>
                                <td class="text-end fw-bold py-3 pt-4 fs-5 text-primary">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12">
                        <span class="text-muted small">* {{ __('All prices are inclusive of taxes where applicable.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
