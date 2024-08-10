    @php

    use Illuminate\Support\Facades\Storage;

@endphp

@extends('layout')



@section('root')

    <form method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="mb-2">Tiêu đề</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') ?? $item->title }}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>



        <div class="mb-3">
            <label class="mb-2">Ảnh</label>
            <input type="file" class="form-control" name="cover_art">
            @error('cover_art')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>




        <div class="mb-3">
            <label class="mb-2">Người tạo</label>
            <input type="text" class="form-control" name="developer" value="{{ old('developer') ?? $item->developer }}">
            @error('developer')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>




        <div class="mb-3">
            <label class="mb-2">Năm tạo</label>
            <input type="text" class="form-control" name="release_year" value="{{ old('release_year') ?? $item->release_year }}">
            @error('release_year')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>





        <div class="mb-3">
            <label class="mb-2">Thể loại</label>
            <input type="text" class="form-control" name="genre" value="{{ old('genre') ?? $item->release_year }}">
            @error('genre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3 text-end">
            <button class="btn btn-success" type="submit">Sửa</button>
        </div>

    </form>

@endsection


