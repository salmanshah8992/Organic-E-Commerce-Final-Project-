@extends('layouts.admin_dashboard')
@section('admin_content')


<div class="card">
    <div class="card-header">Users List</div>
    <div class="card-body">
    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-30p">SN</th>
            <th class="wd-30p">Name</th>
            <th class="wd-20p">Email</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>

            @php
            $sn=1;
            @endphp

           @foreach ($users as $item)

          <tr>
            <td>{{$sn++}}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
              <a href="{{ route('user_list.edit',$item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>

              <a href="{{ route('user.delete',$item->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>
    </div><!-- table-wrapper -->
  </div>
  </div><!-- card -->






@endsection

