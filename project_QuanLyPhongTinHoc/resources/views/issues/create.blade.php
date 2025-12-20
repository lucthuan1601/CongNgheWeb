@extends('layouts.app')

@section('title', 'Thêm vấn đề mới')

@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Thêm vấn đề mới</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('issues.store')}}" method="POST">
            @csrf
            {{-- Máy tính --}}
            <div class="mb-3">
                <label class="form-label">Máy tính</label>
                <select name="computer_id" class="form-select" required>
                    <option value="">-- Chọn máy --</option>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">
                            {{ $computer->computer_name }} - {{ $computer->model }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Người báo cáo --}}
            <div class="mb-3">
                <label class="form-label">Người báo cáo</label>
                <input type="text" name="reported_by" class="form-control" required>
            </div>

            {{-- Thời gian báo cáo --}}
            <div class="mb-3">
                <label class="form-label">Thời gian báo cáo</label>
                <input type="datetime-local" name="reported_date" class="form-control" values="{{ now()}}" required>
            </div>

            {{-- Mô tả --}}
            <div class="mb-3">
                <label class="form-label">Mô tả sự cố</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            {{-- Mức độ --}}
            <div class="mb-3">
                <label class="form-label">Mức độ sự cố</label>
                <select name="urgency" class="form-select" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>

            {{-- Trạng thái --}}
            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Resolved">Resolved</option>
                </select>
            </div>

            <div class="text-end">
                <a href="{{ route('issues.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    Lưu vấn đề
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
