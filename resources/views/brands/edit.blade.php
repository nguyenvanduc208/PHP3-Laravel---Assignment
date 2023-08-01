
@extends('admin.layouts.main')
@section('content')
    <div class="col-6">
    <h3>Edit Brand</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Brand Name</label>
          <input type="text" class="form-control" name="name" value="{{$data->name}}" aria-describedby="emailHelp">
          @error('name')
              <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control" name="address" value="{{$data->address}}" aria-describedby="emailHelp">
            @error('address')
              <p class="text-danger">{{$message}}</p>
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


