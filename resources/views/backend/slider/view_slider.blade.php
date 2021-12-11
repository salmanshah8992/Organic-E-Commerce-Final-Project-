@extends('layouts.admin_dashboard')

@section('admin_content')

<section id="responsive-datatable">
    <div class="row">

      <div class="col-8">
        <div class="card">
          <div class="card-header border-bottom">
            <h4 class="card-title">All Category</h4>
          </div>
          <div class="card-datatable">
            <table class="dt-responsive table dataTable dtr-column collapsed" id="DataTables_Table_3" role="grid"     aria-describedby="DataTables_Table_3_info">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Title En</th>
                        <th>Title Bn</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sn=1;
                    @endphp
                    @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>
                            <img src="{{ asset($slider->image) }}" alt="" height="80px">
                        </td>
                        <td>{{ $slider->title_en }}</td>
                        <td>{{ $slider->title_bn }}</td>
                        <td>
                            <button type="button" class="btn btn-relief-warning mb-1"><a href="{{ route('edit.slider',$slider->id) }}">Edit</a></button>
                            <button type="button" class="btn btn-relief-danger"><a href="{{ route('delete.slider',$slider->id) }}">
                              Delete</a> </button>
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
            <h4 class="card-title">SLider Add</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('store.slider') }}" enctype="multipart/form-data" class="form form-vertical">
                @csrf
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Title Name English</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="first-name-icon" class="form-control" name="title_name_en" placeholder="Title Name English">
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
                        <input type="text" id="first-name-icon" class="form-control" name="title_name_bn" placeholder="Title Name Bangla">
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
                        <input type="text" id="first-name-icon" class="form-control" name="description_name_en" placeholder="Description Name English">
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
                          <input type="text" id="first-name-icon" class="form-control" name="description_name_bn" placeholder="Description Name Bangla">
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

    </div>
  </section>

@endsection