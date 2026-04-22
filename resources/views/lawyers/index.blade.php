@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-bold">قائمة المحامين</h1>
        <a href="{{ route('lawyers.create') }}" class="btn btn-dark shadow-sm">
            <i class="fas fa-plus-circle"></i> إضافة محامي جديد
        </a>
    </div>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm" style="border-right: 5px solid #28a745 !important;">
            {{ session('success') }}
        </div>
    @endif

    <div class="row pt-3">
        @foreach ($lawyers as $lawyer)
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm lawyer-card"
                    style="border-radius: 12px; overflow: hidden; transition: transform 0.2s;">

                    {{-- Lawyer Image --}}
                    <div class="position-relative">
                        <img src="{{ $lawyer->image ? asset('storage/' . $lawyer->image) : 'https://via.placeholder.com/300' }}"
                            class="card-img-top" style="height:220px; object-fit:cover; border-bottom: 1px solid #eee;">
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="font-weight-bold mb-2 text-dark text-truncate">{{ $lawyer->name }}</h5>
                            <p class="text-muted small mb-3">
                                {{ Str::limit($lawyer->description, 60) }}
                            </p>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="d-flex gap-2 justify-content-center border-top pt-3">
                            <a href="{{ route('lawyers.edit', $lawyer->id) }}"
                                class="btn btn-outline-primary btn-sm px-3 mx-1" style="border-radius: 6px;">
                                <i class="fas fa-edit"></i> تعديل
                            </a>

                            <form action="{{ route('lawyers.destroy', $lawyer->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm px-3 mx-1" style="border-radius: 6px;"
                                    onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                    <i class="fas fa-trash-alt"></i> حذف
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <style>
        .lawyer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
        }

        .btn-sm {
            font-size: 0.85rem;
            font-weight: 500;
        }
    </style>
@endsection
