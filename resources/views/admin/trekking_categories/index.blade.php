@extends('layouts.main')

@section('title', 'Trekking Categories')
@section('breadcrumb-item', 'Trekking')
@section('breadcrumb-item-active', 'Manage Categories')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')

@if(session('toast') || session('success') || session('error'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast show animate__animated animate__fadeInDown" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset('favicon.svg') }}" class="img-fluid me-2" alt="favicon" style="width: 17px">
                <strong class="me-auto">MonAsso</strong>
                <small>Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('toast') ?? session('success') ?? session('error') }}
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card table-card animate__animated animate__fadeIn">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <h5 class="mb-3 mb-sm-0">Trekking Category List</h5>
                    <a href="{{ route('admin.trekking-categories.create') }}" class="btn btn-primary">Add Category</a>
                </div>
            </div>

            <div class="card-body pt-3">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $index => $category)
                                <tr class="animate__animated animate__fadeInUp" style="animation-delay: {{ $index * 0.1 }}s;">
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.trekking-categories.edit', $category) }}"
                                           class="btn btn-sm btn-outline-primary me-2" title="Edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.trekking-categories.destroy', $category) }}"
                                              method="POST" class="d-inline-block"
                                              onsubmit="return confirm('Delete this category?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No trekking categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($categories->hasPages())
                    <div class="mt-3">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toastEl = document.getElementById('liveToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
@endsection
