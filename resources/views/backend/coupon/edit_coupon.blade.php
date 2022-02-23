@extends('layouts.admin_dashboard')

@section('admin_content')

<section id="responsive-datatable">
    <div class="row">


      <div class="col-3"></div>

      <div class="col-6">
        <div class="card">
            <div class="card-header">
              <h4 class="card-title">Coupon Update</h4>
            </div>
            <div class="card-body">
              <form  method="POST" action="{{ route('update.coupon') }}" class="form form-vertical">
                  @csrf

                <input type="hidden" value="{{ $coupon->id }}" name="id">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Coupon Name</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="coupon_name" value="{{ $coupon->coupon_name }}">
                      </div>
                      @error('coupon_name')
                            <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                      <div class="mb-1">
                        <label class="form-label" for="first-name-icon">Coupon Discount</label>
                        <div class="input-group input-group-merge">
                          <input type="text" id="first-name-icon" class="form-control" name="coupon_discount" value="{{ $coupon->coupon_discount }}">
                        </div>
                        @error('coupon_discount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>

                  <div class="col-12">
                      <div class="mb-1">
                        <label class="form-label" for="first-name-icon">Coupon Validity</label>
                        <div class="input-group input-group-merge">
                          <input type="date" id="first-name-icon" class="form-control" name="coupon_validity" value="{{ $coupon->coupon_validity }}">
                        </div>
                        @error('coupon_validity')
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
