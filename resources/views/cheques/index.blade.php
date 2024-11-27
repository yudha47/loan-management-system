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
                        <li class="breadcrumb-item active">Cheques</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <h4>All Cheques</h4>
            <br>
            <button class="btn btn-info"><a href="{{route('cheque.create')}}" style="color:white"> New
                    Cheque</a></button>
            <br><br>
            <table class="table table-striped" id="Cheques">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Check Number</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Beneficiary</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cheques as $cheque)
                        <tr>

                            <th scope="row">{{ $cheque->id }}</th>
                            <td>{{ $cheque->check_number }}</td>
                            <td>{{ $cheque->amount }}</td>
                            <td>{{ $cheque->beneficiary }}</td>                           

                            <td>
                                
                                    <a href="{{route('cheque.show',$cheque->id)}}" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i> View</a>
                               
                               
                                    <a href="{{route('cheque.edit',$cheque->id)}}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form class="d-inline" action="{{route('cheque.destroy',$cheque->id)}}" method="POST">
                                          @method('DELETE')
                                          @csrf
                                          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                               
                            </td>


                        </tr>
                        @include('deletes.cheque')
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            $('#Cheques').DataTable({
                "lengthChange": false,
                dom: 'Bfrtip',

                buttons: [{
                        extend: 'pdfHtml5',
                        className: 'btn btn-info',
                        title: 'Cheques',
                    },
                    {
                        extend: 'csvHtml5',
                        className: 'btn btn-success',
                        title: 'Cheques',
                    },
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-primary',
                        title: 'Cheques',
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-secondary',
                        title: 'Cheques',
                    },


                ]

            });
        </script>



    </section>
    <!-- /.content -->
</div>




@include('layouts.footer')
