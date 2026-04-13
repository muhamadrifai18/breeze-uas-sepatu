@extends('sneat.layouts.app')

@section('title', __('Edit Product'))

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Edit Product') }}</h5>
                <small class="text-muted float-end">{{ __('Update Product Details') }}</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label" for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Product Name" required autofocus />
                        @error('name')
                            <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="category_id">{{ __('Category') }}</label>
                        <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">{{ __('Select a Category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="price">{{ __('Price') }}</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">Rp</span>
                            <input type="number" step="1" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="0" required />
                        </div>
                        @error('price')
                            <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block" for="image">{{ __('Product Image') }}</label>
                        @if($product->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded" width="100" height="100" style="object-fit: cover;">
                            </div>
                        @endif
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" />
                        <small class="text-muted">{{ __('Leave blank to keep existing image.') }}</small>
                        @error('image')
                            <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">{{ __('Description') }}</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Product Description">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">{{ __('Save Changes') }}</button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
