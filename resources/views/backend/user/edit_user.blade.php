@extends('layouts.admin_dashboard')
@section('admin_content')

<form action="{{ route('user_list.update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $user_edit->id }}">
    <div class="form-group">
      <label class="form-control-label">User Name: <span class="tx-danger">*</span></label>
      <input class="form-control" type="text" name="name" value="{{ $user_edit->name }}" placeholder="Enter Username">
      <br>
      @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
        <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="email" value="{{ $user_edit->email}}" placeholder="Enter Username">
        <br>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

    <div class="form-layout-footer">
      <button type="submit" class="btn btn-info">User Update</button>
    </div><!-- form-layout-footer -->
  </form>


@endsection
