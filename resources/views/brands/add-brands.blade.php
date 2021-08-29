
@extends('admin.layouts.main')
@section('content')
  <div class="col-6">
    <h3>Add Brand</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Brand Name</label>
          <input type="text" class="form-control" value="{{ old('name') }}" name="name" aria-describedby="emailHelp">
          @error('name')
              <p class="text-danger">{{$message}}</p> 
          @enderror
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control" value="{{ old('address') }}" name="address" aria-describedby="emailHelp">
            @error('address')
              <p class="text-danger">{{$message}}</p> 
          @enderror
          </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="form-control" name="image">
          @error('image')
              <p class="text-danger">{{$message}}</p> 
          @enderror
        </div>       
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
@endsection
    
