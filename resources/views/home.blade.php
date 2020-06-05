@extends('layouts.app')
@section('content')

@include('layouts.menubar')

{{-- <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script> --}}

<div class="cart_section pt-4">
    <div class="container">
        <h2 class="mt-3 mb-5">Order List</h2>
        <div class="row">
            <div class="col-12 card">
                <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">PaymentType</th>
                            <th scope="col">Payment ID</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status Code</th>
                            <th scope="col">Status </th>
                            <th scope="col" style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <th>{{ $row->payment_type }}</th>
                            <td>{{ $row->payment_id }}</td>
                            <td>{{ $row->total }} Tk</td>
                            <td>{{ $row->date }}</td>
                            <td>
                              @if ($row->return_order == 0)
                                @if($row->status == 0)
                                <span class="badge badge-warning">Order git clonePending</span>
                                @elseif($row->status == 1)
                                <span class="badge badge-info">Payment Accept</span>
                                @elseif($row->status == 2)
                                <span class="badge badge-primary">Order in Progress</span>
                                @elseif($row->status == 3)
                                <span class="badge badge-success">Order Delevered</span>
                                @else
                                <span class="badge badge-danger">Order Canceled</span>
                                @endif                              
		                       	  @elseif($row->return_order == 1)
		                       	    <span class="badge badge-primary">Return Pending</span>
		                       	  @elseif($row->return_order == 2) 
                                 <span class="badge badge-success">Return Successful</span>
                              @elseif($row->return_order == 3) 
		                       	    <span class="badge badge-danger">Return Canceled</span>
                              @endif
                            </td>
                            <td>{{ $row->status_code }}</td>
                            <td>
                              @if($row->status == 3)
                                @if ($row->return_order == 0 || $row->return_order == 3)
                                  <a href="#" class="btn btn-sm btn-info">View</a>
                                  <a href="{{ route('order.return', $row->id) }}" class="btn btn-sm btn-warning" id="return">Return</a>    
                                @else
                                  <a href="#" class="btn btn-sm btn-info" style="width:80%;">View</a>
                                @endif
                              @elseif($row->status == 4)
                                <a href="#" class="btn btn-sm btn-info" style="width:80%;">View</a>
                              @else
                                <a href="#" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('order.cancel', $row->id) }}" class="btn btn-sm btn-danger" id="cancel">Cancel</a>
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

@endsection
