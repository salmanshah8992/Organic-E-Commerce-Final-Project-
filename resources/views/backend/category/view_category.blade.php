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
                        <th>Category Name En</th>
                        <th>Category Name Bn</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sn=1;
                    @endphp
                    @foreach ($categorys as $category)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $category->category_name_en }}</td>
                        <td>{{ $category->category_name_bn }}</td>
                        <td>
                            <button type="button" class="btn btn-relief-warning"><a href="{{ route('edit.category',$category->id) }}"><i class="fa fa-edit"></i></a></button>
                            <button type="button" class="btn btn-relief-danger"><a href="{{ route('delete.category',$category->id) }}">
                              <i class="fa fa-trash"></i></a> </button>
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
            <h4 class="card-title">Category Add</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('add.category') }}" class="form form-vertical">
                @csrf
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Category Name English</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="first-name-icon" class="form-control" name="cat_name_en" placeholder="Category Name English">
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
                        <input type="text" id="first-name-icon" class="form-control" name="cat_name_bn" placeholder="Category Name Bangla">
                      </div>
                      @error('cat_name_bn')
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
