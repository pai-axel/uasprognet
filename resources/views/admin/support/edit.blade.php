@extends('sb-admin/app')
@section('title', 'Support')
@section('support', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Support</h1>

    <form action="/support/{{$support->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
                <div class="form-group">
                    <label for="client_name">Client Name</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" value="{{old('client_name') ? old('client_name') : $support->client_name}}">
                    @error('client_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="client_phone">Client Phone</label>
                    <input type="phone" class="form-control" id="client_phone" name="client_phone" value="{{old('client_phone') ? old('client_phone') : $support->client_phone}}">
                    @error('client_phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="client_email">Client Email</label>
                    <input type="email" class="form-control" id="client_email" name="client_email" value="{{old('client_email') ? old('client_email') : $support->client_email}}">
                    @error('client_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="client_text">Client Text</label>
                    <textarea class="form-control" rows="10" id="client_text" name="client_text">{{ old('client_text', $support->client_text) }}</textarea>
                    @error('client_text')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/support" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

