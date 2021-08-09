@extends('admin.admin_layouts')
@section('admin_content')
<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map-data m-b-50 ">
                            <h2 class="title-1">This Year Report
                            </h2><br>
                            <h6 class="card-body-title"> <span class="badge badge-success">
                                    <h5> Total Amount This Year Rp {{ $total }}</h5>
                                </span> </h6>
                            <div class="table-wrapper">
                                <table id="datatable3" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Payment Type</th>
                                            <th class="wd-15p">Transction ID</th>
                                            <th class="wd-15p">SubTotal</th>
                                            <th class="wd-20p">Shipping</th>
                                            <th class="wd-20p">Total</th>
                                            <th class="wd-20p">Date</th>
                                            <th class="wd-20p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order as $row)
                                        <tr>
                                            <td>{{ $row->payment_type }}</td>
                                            <td>{{ $row->blnc_transection }}</td>
                                            <td>Rp{{ $row->subtotal }}</td>
                                            <td>Rp{{ $row->shipping }}</td>
                                            <td>Rp{{ $row->total }}</td>
                                            <td>{{ $row->date }} </td>
                                            <td>
                                                @if($row->status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                                @elseif($row->status == 1)
                                                <span class="badge badge-info">Payment Accept</span>
                                                @elseif($row->status == 2)
                                                <span class="badge badge-warning">Progress</span>
                                                @elseif($row->status == 3)
                                                <span class="badge badge-success">Delevered</span>
                                                @else
                                                <span class="badge badge-danger">Cancle</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ URL::to('admin/view/order/'.$row->id) }} "
                                                    class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                        <!--  END TOP CAMPAIGN-->
                    </div>
                </div><!-- sl-mainpanel -->
                <!-- </div> -->
            </div>
        </div>
        @endsection
