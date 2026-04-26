@extends('adminlte::page')

@section('title', 'المكتبات')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-bold text-dark">إدارة المكتبات</h1>
        <a href="{{ route('libraries.create') }}" class="btn btn-dark px-4 shadow-sm" style="border-radius: 6px;">
            <i class="fas fa-plus-circle"></i> إضافة عنصر جديد
        </a>
    </div>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4"
            style="border-right: 5px solid #28a745 !important; border-radius: 8px;">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 py-3 px-4" style="width: 25%">العنوان</th>
                        <th class="border-0 py-3" style="width: 20%">نوع المحتوى</th>
                        <th class="border-0 py-3 text-center" style="width: 15%">الصورة</th>
                        <th class="border-0 py-3 text-center" style="width: 20%">إجراءات التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libraries as $item)
                        @php
                            $file = $item->image;
                            $extension = $file ? strtolower(pathinfo($file, PATHINFO_EXTENSION)) : null;
                        @endphp

                        <tr>
                            <td class="align-middle px-4 font-weight-bold text-dark">
                                {{ $item->title }}
                            </td>

                            <td class="align-middle">
                                <span class="badge badge-light border px-3 py-2" style="border-radius: 20px; color: #555;">
                                    {{ $item->case_type }}
                                </span>
                            </td>

                            <td class="align-middle text-center">
                                @if ($file)
                                    @if ($extension === 'pdf')
                                        {{-- أيقونة PDF --}}
                                        <img src="https://img.freepik.com/vecteurs-premium/icone-du-logiciel-pdf_539007-781.jpg?semt=ais_hybrid&w=740"
                                            class="img-thumbnail rounded-circle shadow-sm"
                                            style="width: 45px; height: 45px; object-fit: cover; border: 2px solid #fff;">
                                    @else
                                        {{-- صورة عادية --}}
                                        <img src="{{ asset('storage/' . $file) }}"
                                            class="img-thumbnail rounded-circle shadow-sm"
                                            style="width: 45px; height: 45px; object-fit: cover; border: 2px solid #fff;">
                                    @endif
                                @else
                                    {{-- مفيش صورة --}}
                                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                        style="width: 45px; height: 45px; border: 1px dashed #ccc;">
                                        <i class="fas fa-image text-muted small"></i>
                                    </div>
                                @endif
                            </td>

                            <td class="align-middle text-center">
                                <div class="btn-group">

                                    {{-- زر عرض الملف --}}
                                    @if ($file)
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                            class="btn btn-sm mx-1 px-3 {{ $extension === 'pdf' ? 'btn-danger' : 'btn-info' }}"
                                            style="border-radius: 6px;" title="عرض">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endif

                                    {{-- تعديل --}}
                                    <a href="{{ route('libraries.edit', $item->id) }}"
                                        class="btn btn-outline-primary btn-sm mx-1 px-3" style="border-radius: 6px;"
                                        title="تعديل">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    {{-- حذف --}}
                                    <form action="{{ route('libraries.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm mx-1 px-3" style="border-radius: 6px;"
                                            onclick="return confirm('هل أنت متأكد من حذف هذا العنصر؟')" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if ($libraries->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-folder-open text-muted fa-3x mb-3"></i>
            <p class="text-muted">لا توجد بيانات متاحة حالياً في المكتبة.</p>
        </div>
    @endif

    <style>
        .table thead th {
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            color: #666;
        }

        .table tbody tr:hover {
            background-color: #fbfbfb;
        }

        .badge-light {
            background-color: #f8f9fa;
        }
    </style>
@endsection
