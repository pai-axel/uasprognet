@extends('sb-admin/app')
@section('title', 'Berita')
@section('berita', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Berita</h1>

    <form action="/berita/{{$berita->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="berita_title">Berita</label>
            <input type="text" class="form-control" id="berita_title" name="berita_title" value="{{old('berita_title') ? old('berita_title') : $berita->berita_title}}">
            @error('berita_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-2">
                <img src="/upload/berita/{{$berita->berita_sampul_1}}" width="100%" height="150px" class="mt-2" alt="">
            </div>
            <div class="col-md-2">
                <img src="/upload/berita/{{$berita->berita_sampul_2}}" width="100%" height="150px" class="mt-2" alt="">
            </div>
            <div class="col-md-2">
                <img src="/upload/berita/{{$berita->berita_sampul_3}}" width="100%" height="150px" class="mt-2" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="berita_sampul_1">Berita Sampul 1</label>
                    <input type="file" class="form-control" id="berita_sampul_1" name="berita_sampul_1">
                    @error('berita_sampul_1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berita_sampul_2">Berita Sampul 2</label>
                    <input type="file" class="form-control" id="berita_sampul_2" name="berita_sampul_2">
                    @error('berita_sampul_2')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berita_sampul_3">Berita Sampul 3</label>
                    <input type="file" class="form-control" id="berita_sampul_3" name="berita_sampul_3">
                    @error('berita_sampul_3')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori_berita">Kategori Berita</label>
                    <select class="form-control" id="kategori_berita" name="kategori_berita">
                        @foreach ($kategori_berita as $row)
                            @if ($row->id == $berita->id_kategori_berita)
                                <option value="{{$row->id}}">{{$row->kategori_berita_name}}</option>
                            @endif
                        @endforeach
                        @foreach ($kategori_berita as $row)
                            @if ($row->id != $berita->id_kategori_berita)
                                <option value="{{$row->id}}">{{$row->kategori_berita_name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kategori_berita')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="tag_berita">Tag Berita</label>
            <select multiple class="form-control" id="tag_berita" name="tag_berita[]">
                @foreach ($tag_berita as $row)
                    <option value="{{$row->id}}"
                        @foreach ($berita->tag_berita as $tag_berita_lama)
                            @if ($tag_berita_lama->id == $row->id)
                                selected
                            @endif
                        @endforeach
                    >{{$row->tag_berita_name}}</option>
                @endforeach
            </select>
            @error('tag_berita')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Berita Konten 1</label>
            <textarea class="form-control"  rows="10" name="berita_konten_1">{{old('berita_konten_1') ? old('berita_konten_1') : $berita->berita_konten_1}}</textarea>
            @error('berita_konten_1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Berita Konten 2</label>
            <textarea class="form-control" rows="10"  id="editor" name="berita_konten_2">{{old('berita_konten_2') ? old('berita_konten_2') : $berita->berita_konten_2}}</textarea>
            @error('berita_konten_2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/berita" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection