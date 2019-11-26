

@extends('layouts.home')
@section('meta')
    
@endsection
@section('style1')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection
@section('style2')
    
@endsection
@section('script1')
    
@endsection
@section('script2')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control" type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>
@endsection
@section('body')
<div >
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 order-md-12 mb-4">
                <div class="card">
                        
                    <div class="card-body" >
                        <div>
                            <h5 class="card-title" style="clear: both">Bill / List</h5><br>
                        </div><br>
                        <table id="example" class="table table-striped " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Adhar Number</th>
                                        <th>Phone Number</th>
                                        <th>Finance</th>
                                        <th>Outstanding</th>
                                        <th>Total</th>
                                        <th>Final Settlement</th>
                                        {{-- <th>Customer Since</th> --}}
                                    </tr>
                                    
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Adhar Number</th>
                                        <th>Phone Number</th>
                                        <th>Finance</th>
                                        <th>Outstanding</th>
                                        <th>Total</th>
                                        <th>Final Settlement</th>
                                    {{-- <th>Customer Since</th> --}}
                                    </tr>
                                    </tfoot>
                                <tbody>
                                    @foreach ($bills as $item)
                                    <tr>
                                        <td><a href="customer/{{$item->customer_id}}">{{$item->customer->name}}</a></td>
                                        <td>adhar</td>
                                        <td>contact</td>
                                        <td>
                                            @isset($item->finance->companey)
                                            {{$item->finance->companey}} : {{$item->finance->amount}}
                                            @endisset
                                            </td>
                                        <td>{{$item->paid_till_date}}</td>
                                        <td>{{$item->total_amount}}</td>
                                        <td>
                                            @if ($item->full_satalment == 0)
                                                NO
                                            @else
                                                YES
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                    </div>
                </div>   
            </div>
        </div>
        </div>
    </section>
</div>
@endsection