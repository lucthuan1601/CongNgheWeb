@extends('layouts.about')

@section('content')
<h1 class="mb-4">Sửa bài viết</h1>

{{-- Form tạo bài viết --}}
<form action="{{ route('posts.update',$post->id)}}" method="POST">
    @csrf
    @method('PUT')
    {{-- Tiêu đề --}}
    <div class="mb-3">
        <label class="form-label">Tiêu đề</label>
        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        @error('title')
            <div class="is-invalid" style="color: red">{{$message }}</div>
        @enderror
    </div>
    {{-- Nội dung --}}
    <div class="mb-3">
        <label class="form-label">Nội dung</label>
        <textarea name="content" class="form-control" rows="5" placeholder="Nhập nội dung bài viết"></textarea>
        @error('content')
            <div class="is-invalid" style="color: red">{{ $message }}</div>
        @enderror
    </div>
    {{-- Nút hành động --}}
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            💾 Cập nhật bài viết
        </button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">
            ⬅ Quay lại
        </a>
    </div>
</form>
@endsection
