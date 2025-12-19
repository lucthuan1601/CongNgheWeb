@extends('layouts.about')

@section('content')
<h1 class="mb-4">➕ Thêm bài viết mới</h1>

{{-- Form tạo bài viết --}}
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    {{-- Tiêu đề --}}
    <div class="mb-3">
        <label class="form-label">Tiêu đề bài viết</label>
        <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề bài viết">
        @error('title')
            <div style="color: red">{{$message }}</div>
        @enderror
    </div>
    {{-- Nội dung --}}
    <div class="mb-3">
        <label class="form-label">Nội dung bài viết</label>
        <textarea name="content" class="form-control" rows="5" placeholder="Nhập nội dung bài viết"></textarea>
        @error('content')
            <div style="color: red">{{ $message }}</div>
        @enderror
    </div>

    {{-- Nút hành động --}}
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            💾 Lưu bài viết
        </button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">
            ⬅ Quay lại
        </a>
    </div>
</form>
@endsection
