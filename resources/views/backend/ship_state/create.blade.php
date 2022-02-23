@extends('layouts.admin_dashboard')
@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">SHopMama</a>
      <span class="breadcrumb-item active">state</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">state List</div>
            <div class="card-body">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-30p">Division Name</th>
                    <th class="wd-30p">District Name</th>
                    <th class="wd-30p">state Name</th>
                    <th class="wd-20p">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($states as $item)
                  <tr>
                    <td>{{ $item->division->division_name }}</td>
                    <td>{{ $item->district->district_name }}</td>
                    <td>{{ $item->state_name }}</td>
                    <td>
                      <a href="{{ url('state-edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>

                      <a href="{{ url('state-delete/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div>
          </div><!-- card -->
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Add New state</div>
              <div class="card-body">
            <form action="{{ route('state-store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-control-label">Select Division: <span class="tx-danger">*</span></label>
                    <select class="form-control select2-show-search" data-placeholder="Select One" name="division_id">
                      <option label="Choose one"></option>
                      @foreach ($divisions as $division)
                      <option value="{{ $division->id }}">{{ ucwords($division->division_name) }}</option>
                      @endforeach
                    </select><br>
                    @error('division_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Select District: <span class="tx-danger">*</span></label>
                    <select class="form-control select2-show-search" data-placeholder="Select One" name="district_id">
                      <option label="Choose one"></option>

                    </select><br>
                    @error('district_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                <div class="form-group">
                  <label class="form-control-label">state Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="state_name" value="{{ old('state_name') }}" placeholder="Enter state_name"><br>
                  @error('state_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-layout-footer">
                  <button type="submit" class="btn btn-info">state Create</button>
                </div><!-- form-layout-footer -->
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script src="{{ asset('frontend') }}/libs/jquery/jquery.js"></script>

<script type="text/javascript">

    $('select[name="division_id"]').on('change', function(){
        var division_id = $(this).val();
        if(division_id) {
            $.ajax({
                url: "/district-get/ajax/"+division_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="district_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');

                      });
                },
            });
        } else {
            alert('danger');
        }
    });

</script>

@endsection
