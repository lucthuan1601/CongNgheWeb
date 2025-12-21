@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Thêm đồ án</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('theses.store')}}" method="POST">
            @csrf
            {{-- tiêu đề --}}
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            {{-- Chương trình--}}
            <div class="mb-3">
                <label class="form-label">Chương trình</label>
                <input type="text" name="program" class="form-control" required>
            </div>
            {{-- Người hướng dẫn --}}
            <div class="mb-3">
                <label class="form-label">Người hướng dẫn</label>
                <input type="text" name="supervisor" class="form-control" required>
            </div>
            {{-- Sinh viên --}}
            <div class="mb-3">
                <label for="student_id" class="form-label fw-bold">Chọn sinh viên</label>
                <select name="student_id" id="student_id" class="form-select" required>
                    <option value="">-- Chọn một sinh viên --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">
                     {{ $student->first_name }} {{ $student->last_name }} (Mã SV: {{ $student->student_number }})
                     </option>
                @endforeach
                </select>
            </div>
            {{-- Ngày nộp đồ án --}}
            <div class="mb-3">
                <label class="form-label">Ngày nộp đồ án</label>
                <input type="datetime-local" name="submission_date" class="form-control" required>
            </div>
            {{-- Ngày bảo vệ--}}
            <div class="mb-3">
                <label class="form-label">Ngày bảo vệ</label>
                <input type="datetime-local" name="defense_date" class="form-control" required>
            </div>
            {{-- tóm tắt --}}
             <div class="mb-3">
                <label class="form-label">Nội dung Tóm tắt</label>
                <textarea name="abstract" class="form-control" row="10" required></textarea>
            </div>
            <div class="text-end">
                <a href="{{ route('theses.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    Lưu đồ án
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
