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
                    <h3 class="m-0">Dashboard</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Cheques</li>
                        <li class="breadcrumb-item active">{{ $cheque->check_number }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">




        <section style="background-color: #eee;">
            <div class="container py-5">
          
              <div class="row">

                <div class="card mb-4 col-lg-8">
                  <div class="card-body p-0">
                    <a href="{{route('cheque.index')}}" class="btn btn-sm btn-primary mt-3 px-3">Back</a>
                    <ul class="list-group list-group-flush rounded-3">
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        Check Number
                        <p class="mb-0"> {{$cheque->check_number}}</p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                       Amount
                       <p class="mb-0"> {{$cheque->amount}}</p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                       Beneficiary
                       <p class="mb-0"> {{$cheque->beneficiary}}</p>
                      </li>
                    </ul>
                  </div>
                </div>                 
              </div>

                </div>
              </div>
            
          </section>
          
           
    </section>
    <!-- /.content -->
</div>




@include('layouts.footer')
