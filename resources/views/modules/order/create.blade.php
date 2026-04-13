@extends('sneat.layouts.app')

@section('title', __('Create Order'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                <i class="bx bx-chevron-left"></i> {{ __('Back to List') }}
            </a>
        </div>

        <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
            @csrf
            <div class="row">
                <!-- Order Details -->
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ __('Order Items') }}</h5>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addItem">
                                <i class="bx bx-plus"></i> {{ __('Add Item') }}
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0" id="itemsTable">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Product') }}</th>
                                            <th width="150">{{ __('Quantity') }}</th>
                                            <th width="100">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemsBody">
                                        <tr class="item-row">
                                            <td>
                                                <select name="products[0][id]" class="form-select product-select" required>
                                                    <option value="">{{ __('Select Product') }}</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                            {{ $product->name }} (Rp {{ number_format($product->price, 0, ',', '.') }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="products[0][quantity]" class="form-control quantity-input" value="1" min="1" required>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm remove-item" disabled>
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Settings -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">{{ __('Order Settings') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="user_id">{{ __('Customer') }}</label>
                                <select id="user_id" name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                    <option value="">{{ __('Select Customer') }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary d-grid w-100 mb-2">
                                    {{ __('Create Order') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addItemBtn = document.getElementById('addItem');
        const itemsBody = document.getElementById('itemsBody');
        let rowCount = 1;

        addItemBtn.addEventListener('click', function() {
            const newRow = document.querySelector('.item-row').cloneNode(true);
            
            // Update names and reset values
            const select = newRow.querySelector('select');
            select.name = `products[${rowCount}][id]`;
            select.value = '';
            
            const input = newRow.querySelector('input');
            input.name = `products[${rowCount}][quantity]`;
            input.value = 1;

            const removeBtn = newRow.querySelector('.remove-item');
            removeBtn.disabled = false;
            
            itemsBody.appendChild(newRow);
            rowCount++;
            updateRemoveButtons();
        });

        itemsBody.addEventListener('click', function(e) {
            if (e.target.closest('.remove-item')) {
                const row = e.target.closest('.item-row');
                if (itemsBody.children.length > 1) {
                    row.remove();
                    updateRemoveButtons();
                }
            }
        });

        function updateRemoveButtons() {
            const buttons = document.querySelectorAll('.remove-item');
            buttons.forEach(btn => {
                btn.disabled = itemsBody.children.length === 1;
            });
        }
    });
</script>
@endpush
@endsection
