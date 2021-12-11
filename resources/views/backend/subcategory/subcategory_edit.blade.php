@extends('layouts.admin_dashboard')

@section('admin_content')

<section id="responsive-datatable">
    <div class="row">


      <div class="col-3"></div>

      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Sub Category Edit</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('update.subcategory') }}" class="form form-vertical">
                @csrf

              <input type="hidden" name="category_id" value="{{ $subcategory->id }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Category Name English</label>
                    <div class="input-group input-group-merge">
                        <select class="form-select form-select-lg" id="selectLarge" name="category_id">
                            <option disabled>Open this select menu</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}"
                                  {{ $cat->id == $subcategory->category_id ? 'selected' : '' }} >
                                  {{  ucwords($cat->category_name_en) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('cat_name_en')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Sub Category Name English</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="cat_name_en" value="{{ $subcategory->subcategory_name_en }}">
                      </div>
                      @error('cat_name_en')
                            <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Sub Category Name Bangla</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="cat_name_bn"
                        value="{{ $subcategory->subcategory_name_bn }}">
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