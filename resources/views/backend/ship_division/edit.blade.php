@extends('layouts.admin_dashboard')
@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">SHopMama</a>
      <span class="breadcrumb-item active">Division</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-4 m-auto">
          <div class="card">
            <div class="card-header">Edit Division</div>
              <div class="card-body">
            <form action="{{ route('division-update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $division->id }}">
                <div class="form-group">
                  <label class="form-control-label">Division Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="division_name" value="{{ $division->division_name }}" placeholder="Enter division_name">
                  <br>
                  @error('division_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-layout-footer">
                  <button type="submit" class="btn btn-info">Division Update</button>
                </div><!-- form-layout-footer -->
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
