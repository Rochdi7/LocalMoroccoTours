@extends('layouts.main')

@section('title', 'Activity Categories')
@section('breadcrumb-item', 'Activities')
@section('breadcrumb-item-active', 'Manage Categories')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')

@if(session('toast'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
    <div class="toast show animate__animated animate__fadeInDown" role="alert">
        <div class="toast-header">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            {{ session('toast') }}
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card table-card animate__animated animate__fadeIn">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <h5 class="mb-3 mb-sm-0">Activity Category List</h5>
                    <a href="{{ route('admin.activity-categories.create') }}" class="btn btn-primary">Add Category</a>
                </div>
            </div>

            <div class="card-body pt-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="category-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr class="animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.activity-categories.edit', $category) }}"
                                       class="btn btn-sm btn-outline-primary me-2" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.activity-categories.destroy', $category) }}"
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
                                <td colspan="3" class="text-center text-muted">No categories found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($categories instanceof \Illuminate\Pagination\LengthAwarePaginator && $categories->hasPages())
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
        const toastEl = document.querySelector('.toast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
@endsection
