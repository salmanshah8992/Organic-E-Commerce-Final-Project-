@extends('layouts.admin_dashboard')

@section('admin_content')

<section id="responsive-datatable">
    <div class="row">

      <div class="col-3"></div>

      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">SLider Update</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('update.slider') }}" enctype="multipart/form-data" class="form form-vertical">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $slider->id }}">
                <input type="hidden" name="old_img" value="{{ $slider->image }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Title Name English</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="first-name-icon" class="form-control" name="title_name_en" value="{{ $slider->title_en }}">
                    </div>
                    @error('title_name_en')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Title Name Bangla</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="title_name_bn" value="{{ $slider->title_bn }}">
                      </div>
                      @error('title_name_bn')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Description Name English</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="description_name_en" value="{{ $slider->description_en }}">
                      </div>
                      @error('description_name_en')
                            <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                      <div class="mb-1">
                        <label class="form-label" for="first-name-icon">Description Name Bangla</label>
                        <div class="input-group input-group-merge">
                          <input type="text" id="first-name-icon" class="form-control" name="description_name_bn" value="{{ $slider->description_en }}">
                        </div>
                        @error('description_name_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">SLider Image</label>
                      <div class="input-group input-group-merge">
                        <input type="file" id="first-name-icon" class="form-control" name="slider_image">
                      </div>
                      @error('slider_image')
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
  </section>

@endsection