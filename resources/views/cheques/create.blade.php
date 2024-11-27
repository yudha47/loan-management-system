@include('layouts.header')
@include('layouts.navigation')
@include('layouts.menu')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Cheque</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="shadow p-3 mb-5 bg-white rounded">

            <form method="post" action="{{route('cheque.store')}}">
              @csrf
              <div class="row">
                  <div class="col-6">

                      <div class="form-group">
                          <label for="inputCheckNumber">Check Number</label>
                          <input id="inputCheckNumber" type="text" name="check_number"
                              value="{{ old('check_number') }}"
                              class="form-control @error('check_number') is-invalid @enderror">
                          @error('check_number')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>



                  <div class="col-6">
                      <div class="form-group">
                          <label for="inputAmount">Amount</label>
                          <input id="inputAmount" type="number" name="amount"
                              value="{{ old('amount') }}"
                              class="form-control @error('amount') is-invalid @enderror">
                          @error('amount')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>


                  <div class="col-6">
                      <div class="form-group">
                          <label for="inputBeneficiary">Beneficiary</label>
                          <input id="inputBeneficiary" type="text" name="beneficiary"
                              value="{{ old('beneficiary') }}"
                              class="form-control @error('beneficiary') is-invalid @enderror">
                          @error('beneficiary')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>

              </div>
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" name="add_client" class="btn btn-primary text-bold"><i
                          class="fa fa-check mr-2"></i>Save</button>
                  </div>
              </div>
            </form>
        </div>




    </section>
    <!-- /.content -->
</div>
@include('layouts.footer')
