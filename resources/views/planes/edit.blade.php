@extends('admin.layouts.main')
@section('content')
    <div class="col-6">
        <h3>Edit Plane</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" name="brand_id" id="">
                    <option value="">--- Select Brand ---</option>
                    @foreach ($brands as $value)
                        <option value="{{ $value->id }}" @if ($value->id == $data->brand_id) selected="selected" @endif>{{ $value->name }}</option>
                    @endforeach
                </select>
                @error('brand_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Plane Name</label>
                <input type="text" class="form-control" name="name" value="{{ $data->name }}"
                    aria-describedby="emailHelp">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
