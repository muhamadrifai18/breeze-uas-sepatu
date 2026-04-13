@extends('sneat.layouts.app')

@section('title', __('Profile Profile'))

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">{{ __('Account Settings') }} /</span> {{ __('Account') }}
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 col-12">
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="col-md-6 col-12">
                @include('profile.partials.update-password-form')
            </div>
            <div class="col-12">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
