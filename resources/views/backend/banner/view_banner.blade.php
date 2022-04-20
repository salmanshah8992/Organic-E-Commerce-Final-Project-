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
                        <th>Banner</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sn=1;
                    @endphp
                    @foreach ($banners as $brand)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>
                            <img src="{{ asset($brand->banner) }}" alt="" width="80px">
                        </td>
                        <td style="display: flex">
                            <button type="button" class="btn btn-relief-danger ml-7"><a href="{{ route('delete.banner',$brand->id) }}"><i class="fa fa-trash"></i></a> </button>
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
            <h4 class="card-title">Banner Add</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('add.banner') }}" enctype="multipart/form-data" class="form form-vertical">
                @csrf
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Banner Image</label>
                    <div class="input-group input-group-merge">
                      <input type="file" id="first-name-icon" class="form-control" name="banner" >
                    </div>
                    @error('banner')
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
