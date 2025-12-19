@extends('layouts.about')

@section('content')
<h1 class="mb-4">Danh sách bài viết</h1>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
    ➕ Thêm bài viết
</a>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th width="150">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->created_at}}</td>
            <td>{{ $post->updated_at }}</td>
            <td>
                <a href="{{ route('posts.edit', ['id'=>$post->id]) }}"
                   class="btn btn-warning btn-sm">Sửa</a>
                {{-- <a href="{{ route('posts.destroy', ['id'=>$post->id]) }}"
                   class="btn btn-danger btn-sm">xóa</a> --}}
                <form action="{{ route('posts.destroy',['id'=>$post->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger " 
                        onclick="return confirm('Bạn có chắc muốn xóa')">
                        Xóa
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">
                Chưa có bài viết
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
