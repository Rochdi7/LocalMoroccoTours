@extends('layouts.main')

@section('title', 'Activities')
@section('breadcrumb-item', 'Tours')
@section('breadcrumb-item-active', 'Manage Activities')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}">
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Activities List</h5>
            </div>
            <div class="card-body pt-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th>Group Size</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activities as $activity)
                                @php
                                    $imageUrl = $activity->getFirstMediaUrl('cover', 'thumb') ?: asset('images/placeholder.png');
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ $imageUrl }}" alt="Activity" class="img-radius wid-40" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0">{{ $activity->title }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $activity->category->name ?? '-' }}</td>
                                    <td>{{ $activity->duration }}</td>
                                    <td>{{ $activity->group_size }}</td>
                                    <td>{{ number_format($activity->base_price, 2) }} MAD</td>
                                    <td>
                                        <a href="{{ route('admin.activities.show', $activity) }}" class="avtar avtar-xs btn-link-secondary" title="View">
                                            <i class="ti ti-eye f-20"></i>
                                        </a>
                                        <a href="{{ route('admin.activities.edit', $activity) }}" class="avtar avtar-xs btn-link-secondary" title="Edit">
                                            <i class="ti ti-edit f-20"></i>
                                        </a>
                                        <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="avtar avtar-xs btn-link-secondary bg-transparent border-0 p-0"
                                                onclick="return confirm('Are you sure?')" title="Delete">
                                                <i class="ti ti-trash f-20"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No activities found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination with styled arrows --}}
                <div class="d-flex justify-content-end mt-3">
                    {{ $activities->onEachSide(1)->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection

@section('scripts')
<script type="module">
    import { DataTable } from "/build/js/plugins/module.js";
    window.dt = new DataTable("#pc-dt-simple");
</script>

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
