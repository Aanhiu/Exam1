@php

    use Illuminate\Support\Facades\Storage;

@endphp

@extends('layout')



@section('root')

    <table class="table table-bordered">

        <tr class="bg-success">
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Người tạo</th>
            <th>Năm tạo</th>
            <th>Thể loại</th>
            <th>Thao tác</th>
        </tr>

        @forelse ($model as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td><img width="150px" src="{{ Storage::url('/uploads/').$item->cover_art }}" alt="Error"></td>
                <td>{{ $item->developer }}</td>
                <td>{{ $item->release_year }}</td>
                <td>{{ $item->genre }}</td>
                <td>
                    <a href="{{ route('game.edit', ['item' => $item]) }}" class="btn btn-warning">Sửa</a>
                    |
                    <a onclick="return confirm('Xác nhận')" href="{{ route('game.delete', ['item' => $item]) }}" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        @empty
            <tr><th colspan="10" class="text-center text-danger">Không có dữ liệu</th></tr>
        @endforelse

        
    </table>

@endsection


