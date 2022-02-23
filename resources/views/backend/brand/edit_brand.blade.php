@extends('layouts.admin_dashboard')

@section('admin_content')

<section id="responsive-datatable">
    <div class="row">

    <div class="col-3"></div>

    <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Brand Update</h4>
          </div>
          <div class="card-body">
                <form  method="POST" action="{{ route('update.brand') }}" enctype="multipart/form-data" class="form form-vertical">
                @csrf
                <input type="hidden" id="id" name="id" value="{{ $brand->id }}">
                <input type="hidden" name="old_img" value="{{ $brand->brand_image }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Brand Name English</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="first-name-icon" class="form-control" name="brand_name_en"  value="{{ $brand->brand_name_en }}">
                    </div>
                    @error('brand_name_en')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Brand Name Bangla</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="brand_name_bn" value="{{ $brand->brand_name_bn }}">
                      </div>
                      @error('brand_name_bn')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Brand Slug English</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="brand_slug_en" value="{{ $brand->brand_slug_en }}">
                      </div>
                      @error('brand_slug_en')
                            <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                      <div class="mb-1">
                        <label class="form-label" for="first-name-icon">Brand Slug Bangla</label>
                        <div class="input-group input-group-merge">
                          <input type="text" id="first-name-icon" class="form-control" name="brand_slug_bn" value="{{ $brand->brand_slug_bn }}">
                        </div>
                        @error('brand_slug_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">SLider Image</label>
                      <div class="input-group input-group-merge">
                        <input type="file" id="first-name-icon" class="form-control" name="brand_image">
                      </div>
                      @error('brand_image')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>

    <div class="col-3"></div>

    </div>
</div>

@endsection
