@extends('layouts.admin_dashboard')


@section('admin_content')

<section id="responsive-datatable">
    <div class="row">

      <div class="col-8">
        <div class="card">
          <div class="card-header border-bottom">
            <h4 class="card-title">All Brand</h4>
          </div>
          <div class="card-datatable">
            <table class="dt-responsive table dataTable dtr-column collapsed" id="DataTables_Table_3" role="grid"     aria-describedby="DataTables_Table_3_info">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Brand Name En</th>
                        <th>Brand Name Bn</th>
                        <th>Brand Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sn=1;
                    @endphp
                    @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $brand->brand_name_en }}</td>
                        <td>{{ $brand->brand_name_bn }}</td>
                        <td>
                            <img src="{{ asset($brand->brand_image) }}" alt="" width="80px">
                        </td>
                        <td style="display: flex">
                          {{-- <button class="btn"><i class="fa fa-trash"></i></button> --}}
                            <button type="button" class="btn btn-relief-warning"><a href="{{ route('edit.brand',$brand->id) }}"><i class="fa fa-edit"></i></a></button>   
                            <button type="button" class="btn btn-relief-danger ml-7"><a href="{{ route('delete.brand',$brand->id) }}"><i class="fa fa-trash"></i></a> </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Brand Add</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('add.brand') }}" enctype="multipart/form-data" class="form form-vertical">
                @csrf
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Brand Name English</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="first-name-icon" class="form-control" name="brand_name_en" placeholder="Brand Name English">
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
                        <input type="text" id="first-name-icon" class="form-control" name="brand_name_bn" placeholder="Brand Name Bangla">
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
                        <input type="text" id="first-name-icon" class="form-control" name="brand_slug_en" placeholder="Brand Slug English">
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
                          <input type="text" id="first-name-icon" class="form-control" name="brand_slug_bn" placeholder="Brand Slug Bangla">
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

    </div>
  </section>

@endsection
