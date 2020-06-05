@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Reports</span>
        @if ($display == '')
            <span class="breadcrumb-item active">Search Report</span>        
        @else
            <a class="breadcrumb-item" href="{{ route('search.report') }}">Search Report</a>
        @endif
    </nav>

    <div class="sl-pagebody" style="display: {{ $display }};">
        <div class="sl-page-title">
            <h5>Search Order</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Search Report</h6>

            <div class="table-wrapper">
                <div class="row">
                    <div class="col-lg-4">
                               <form method="post" action="{{ route('search.by.date') }}">
                                 @csrf
                                 <div class="modal-body pd-20">
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">Search By Date</label>
                                     <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date" required="">
                                   </div>
                                 </div><!-- modal-body -->
                                 <div class="modal-footer">
                                   <button type="submit" class="btn btn-info pd-x-20">submit</button>
                                 </div>
                               </form>
                             
                    </div>
       
                     <div class="col-lg-4">
                               <form method="post" action="{{ route('search.by.month') }}">
                                 @csrf
                                 <div class="modal-body pd-20">
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">Search By Month</label>
                                    <select class="form-control" name="month">
                                         <option value="January">January</option>
                                         <option value="February">February</option>
                                         <option value="March">March</option>
                                         <option value="April">April</option>
                                         <option value="May">May</option>
                                         <option value="June">June</option>
                                         <option value="July">July</option>
                                         <option value="August">August</option>
                                         <option value="September">September</option>
                                         <option value="October">October</option>
                                         <option value="November">November</option>
                                         <option value="December">December</option>
                                    </select>
                                   </div>
                                 </div><!-- modal-body -->
                                 <div class="modal-footer">
                                   <button type="submit" class="btn btn-info pd-x-20">submit</button>
                                 </div>
                               </form>
                    </div>
       
                     <div class="col-lg-4">
                            <form method="post" action="{{ route('search.by.year') }}">
                                 @csrf
                                 <div class="modal-body pd-20">
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">Search By Year</label>
                                      <select class="form-control" name="year">
                                         <option value="2018">2018</option>
                                         <option value="2019">2019</option>
                                         <option value="2020">2020</option>
                                         <option value="2021">2021</option>
                                         <option value="2022">2022</option>
                                         <option value="2023">2023</option>
                                         <option value="2024">2024</option>
                                         <option value="2025">2025</option>
                                         <option value="2026">2026</option>
                                         <option value="2027">2027</option>
                                         <option value="2028">2028</option>
                                         <option value="2029">2029</option>
                                          <option value="2030">2030</option>
                                    </select>
                                   </div>
                                 </div><!-- modal-body -->
                                 <div class="modal-footer">
                                   <button type="submit" class="btn btn-info pd-x-20">submit</button>
                                 </div>
                               </form>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-4">
                       <div class="card pd-20 pd-sm-40">
                         <div class="table-wrapper">
                           <form method="post" action="{{ route('search.by.date') }}" >
                             @csrf
                             <div class="modal-body pd-20">
                               <div class="form-group">
                                 <label for="exampleInputEmail1">Search By Date</label>
                                 <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date" required="">
                               </div>
                             </div><!-- modal-body -->
                             <div class="modal-footer">
                               <button type="submit" class="btn btn-info pd-x-20">submit</button>
                             </div>
                           </form>
                         </div><!-- table-wrapper -->
                       </div><!-- card -->
                </div>
   
                 <div class="col-lg-4">
                        <div class="card pd-20 pd-sm-40">
                         <div class="table-wrapper">
                           <form method="post" action="{{ route('search.by.month') }}" >
                             @csrf
                             <div class="modal-body pd-20">
                               <div class="form-group">
                                 <label for="exampleInputEmail1">Search By Month</label>
                                <select class="form-control" name="month">
                                     <option value="January">January</option>
                                     <option value="February">February</option>
                                     <option value="March">March</option>
                                     <option value="April">April</option>
                                     <option value="May">May</option>
                                     <option value="June">June</option>
                                     <option value="July">July</option>
                                     <option value="August">August</option>
                                     <option value="September">September</option>
                                     <option value="October">October</option>
                                     <option value="November">November</option>
                                     <option value="December">December</option>
                                </select>
                               </div>
                             </div><!-- modal-body -->
                             <div class="modal-footer">
                               <button type="submit" class="btn btn-info pd-x-20">submit</button>
                             </div>
                           </form>
                         </div><!-- table-wrapper -->
                       </div><!-- card -->
                </div>
   
                 <div class="col-lg-4">
                        <div class="card pd-20 pd-sm-40">
                         <div class="table-wrapper">
                           <form method="post" action="{{ route('search.by.year') }}" enctype="multipart/form-data">
                             @csrf
                             <div class="modal-body pd-20">
                               <div class="form-group">
                                 <label for="exampleInputEmail1">Search By Year</label>
                                  <select class="form-control" name="year">
                                     <option value="2018">2018</option>
                                     <option value="2019">2019</option>
                                     <option value="2020">2020</option>
                                     <option value="2021">2021</option>
                                     <option value="2022">2022</option>
                                     <option value="2023">2023</option>
                                     <option value="2024">2024</option>
                                     <option value="2025">2025</option>
                                     <option value="2026">2026</option>
                                     <option value="2027">2027</option>
                                     <option value="2028">2028</option>
                                     <option value="2029">2029</option>
                                      <option value="2030">2030</option>
                                </select>
                               </div>
                             </div><!-- modal-body -->
                             <div class="modal-footer">
                               <button type="submit" class="btn btn-info pd-x-20">submit</button>
                             </div>
                           </form>
                         </div><!-- table-wrapper -->
                       </div><!-- card -->
                </div>
            </div> --}}
        </div>
    </div>
    <div class="sl-pagebody" style="display: {{ $visiblity }};">
        <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title mb-4">Report List</h6> Total

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p text-center">SL.</th>
                            <th class="wd-15p text-center">Payment Type</th>
                            <th class="wd-15p text-center">Transection ID</th>
                            <th class="wd-15p text-center">Subtotal</th>
                            <th class="wd-15p text-center">Shipping</th>
                            <th class="wd-15p text-center">Total</th>
                            <th class="wd-15p text-center">Date</th>
                            <th class="wd-15p text-center">Status</th>
                            <th class="wd-20p text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($order as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->payment_type }}</td>
                            <td>{{ $row->blnc_transection }}</td>
                            <td>{{ $row->subtotal }} Tk</td>
                            <td>{{ $row->shipping }} Tk</td>
                            <td>{{ $row->total }} Tk</td>
                            <td>{{ $row->date }}</td>
                            <td>
                                @if($row->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($row->status == 1)
                                    <span class="badge badge-secondary">Payment Accept</span>
                                @elseif($row->status == 2) 
                                    <span class="badge badge-primary">Progress</span>
                                @elseif($row->status == 3)  
                                    <span class="badge badge-success">Delevered</span>
                                @else
                                    <span class="badge badge-danger">Canceled</span>
                                @endif
                            </td>
                            @php
                                $url = 'search';
                            @endphp
                            <td>
                                <a href="{{ route('view.report', ['id' => $row->id, 'url' => $url]) }}" class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
    
    @section('admin_footer')
    @endsection

</div><!-- sl-mainpanel -->

@endsection
