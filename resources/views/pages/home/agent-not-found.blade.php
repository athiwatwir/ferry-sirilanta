@extends('layouts.default')

@section('content')
@php
    $title = $title ?? 'Link not found';
@endphp
<div class="row justify-content-center py-5">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center p-4 p-md-5">
                <div class="mb-3">
                    <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-25 text-warning" style="width: 72px; height: 72px;">
                        <i class="icon-base ti tabler-alert-triangle" style="font-size: 2rem;"></i>
                    </span>
                </div>
                <h3 class="text-main mb-2">{{ $title }}</h3>
                <div class="alert alert-warning mb-4" role="alert">
                    <strong>{{ $message ?? 'The referral link is invalid.' }}</strong>
                    @if (!empty($code))
                        <div class="small text-muted mt-1">Code: {{ $code }}</div>
                    @endif
                </div>
                <p class="text-muted mb-4">
                    Please check the URL and try again, or contact your agent for a new link.
                </p>
                <a href="{{ url('/') }}" class="btn btn-main btn-lg">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
