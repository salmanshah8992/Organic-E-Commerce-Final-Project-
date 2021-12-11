@extends('layouts.admin_dashboard')

@section('admin_content')

<section id="responsive-datatable">
    <div class="row">


      <div class="col-3"></div>

      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Category Edit</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('update.category') }}" class="form form-vertical">
                @csrf

              <input type="hidden" name="category_id" value="{{ $category->id }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Category Name English</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="first-name-icon" class="form-control" name="cat_name_en" value="{{ $category->category_name_en }}">
                    </div>
                    @error('cat_name_en')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Category Name Bangla</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="cat_name_bn"
                        value="{{ $category->category_name_bn }}">
                      </div>
                      @error('cat_name_bn')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Update</button>
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