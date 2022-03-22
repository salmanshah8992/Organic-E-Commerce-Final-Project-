@extends('layouts.admin_dashboard')

@section('admin_content')

<section id="responsive-datatable">
    <div class="row">

      <div class="col-8">
        <div class="card">
          <div class="card-header border-bottom">
            <h4 class="card-title">All Sub Category</h4>
          </div>
          <div class="card-datatable">
            <table class="dt-responsive table dataTable dtr-column collapsed" id="DataTables_Table_3" role="grid"     aria-describedby="DataTables_Table_3_info">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Category Name En</th>
                        <th>Sub Category Name En</th>
                        <th>Sub Category Name Bn</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sn=1;
                    @endphp
                    @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $subcategory->category->category_name_en }}</td>
                        <td>{{ $subcategory->subcategory_name_en }}</td>
                        <td>{{ $subcategory->subcategory_name_bn }}</td>
                        <td>
                            <button type="button" class="btn btn-relief-warning mb-1"><a href="{{ route('edit.subcategory',$subcategory->id) }}"><i class="fa fa-edit"></i></a></button>
                            <button type="button" class="btn btn-relief-danger mb-1"><a href="{{ route('delete.subcategory',$subcategory->id) }}">
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
            <h4 class="card-title">Sub Category Add</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('add.subcategory') }}" class="form form-vertical">
                @csrf
              <div class="row">
                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Category Name English</label>
                      <div class="input-group">
                        <select class="form-select form-select-lg" id="selectLarge" name="category_id">
                            <option disabled >Open this select menu</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">
                                  {{  ucwords($cat->category_name_en) }}
                                </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Sub Category Name English</label>
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
                      <label class="form-label" for="first-name-icon">Sub Category Name Bangla</label>
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