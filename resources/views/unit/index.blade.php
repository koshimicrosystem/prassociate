

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
                            <h5 class="card-title" style="clear: both">Customer / List</h5><br>
                        </div><br>
                        <table id="example" class="table table-striped " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Model</th>
                                        <th>Grn, Engine, Chassis number</th>
                                        <th>Varients</th>
                                        <th>Received</th>
                                        <th>Ndp</th>
                                        <th>Sold</th>
                                        {{-- <th>Customer Since</th> --}}
                                    </tr>
                                    
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Model</th>
                                        <th>Grn, Engine, Chassis number</th>
                                        <th>Varients</th>
                                        <th>Received</th>
                                        <th>Ndp</th>
                                        <th>Sold</th>
                                    {{-- <th>Customer Since</th> --}}
                                    </tr>
                                    </tfoot>
                                <tbody>
                                    @foreach ($units as $item)
                                    <tr>
                                        <td>{{$item->model_name}}</td>
                                        <td>{{$item->grn_number}}, {{$item->engine_number}}, {{$item->chassis_number}}</td>
                                        <td>{{$item->clutch_type}}, {{$item->steering_type}}, {{$item->pto_type}}</td>
                                        <td title="{{$item->created_at}}">{{$item->creared_human}}</td>
                                        <td>{{$item->ndp}}</td>
                                        <td>
                                            @if ($item->sold == 0)
                                                No
                                            @else
                                            <a href="bill/{{$item->bill_id}}">Yes<a>
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