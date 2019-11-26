@extends('layouts.home')
@section('meta')
    
@endsection
@section('style1')
@endsection
@section('style2')
    
@endsection
@section('script1')

@endsection
@section('script2')
@endsection
@section('body')
<div >
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 order-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <customer-show customer_id="{{$customer->id}}"></customer-show>
                    </div>
                </div>   
            </div>
        </div>
        </div>
    </section>
</div>
@endsection