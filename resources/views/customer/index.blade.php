

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
                                        <th>Name</th>
                                        <th>C/o</th>
                                        <th>Phone Number</th>
                                        <th>Adhar Number</th>
                                        <th>Address</th>
                                        {{-- <th>Customer Since</th> --}}
                                    </tr>
                                    
                                </thead>
                                <tfoot>
                                        <tr>
                                        <th>Name</th>
                                        <th>C/o</th>
                                        <th>Phone Number</th>
                                        <th>Adhar Number</th>
                                        <th>Address</th>
                                        {{-- <th>Customer Since</th> --}}
                                        </tr>
                                    </tfoot>
                                <tbody>
                                    @foreach ($customers as $item)
                                    <tr>
                                        <td><a href="customer/{{$item->id}}">{{$item->name}}</a></td>
                                        <td>{{$item->care_of}}</td>
                                        @foreach ($item->contacts as $contact)
                                        @if ($contact->default == 1)
                                            <td>{{$contact->number_email}}</td>
                                            @break
                                        @elseif($loop->last)
                                            <td>No default Number</td>
                                        @endif
                                        @endforeach
                                         @foreach ($item->documents as $document)
                                            @if ($document->name == "Adhar")
                                                <td>{{$document->number}}</td>
                                                @break
                                            @elseif($loop->last)
                                                <td>No adhar found</td>
                                            @endif
                                        @endforeach
                                        
                                        @foreach ($item->addresses as $address)
                                            @if ($address->default == 1)
                                                <td>{{$address->village}}, {{$address->block}}, {{$address->tehshil}}</td>
                                                @break
                                            @elseif($loop->last)
                                                <td>No default address</td>
                                            @endif
                                        @endforeach
                                    
                                        {{-- <td title="{{$item->created_at}}">{{$item->creared_human}}</td> --}}
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