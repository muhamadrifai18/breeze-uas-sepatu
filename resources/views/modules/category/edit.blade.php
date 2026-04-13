@extends('sneat.layouts.app')

@section('title', __('Edit Category'))

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Edit Category') }}</h5>
                <small class="text-muted float-end">{{ __('Update Category Details') }}</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('categories.update', $category) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label" for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Category Name" required autofocus />
                        @error('name')
                            <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">{{ __('Save Changes') }}</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
