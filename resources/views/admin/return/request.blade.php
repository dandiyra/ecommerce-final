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
                        <div class="map-data m-b-60 ">
                            <h2 class="title-1">Return Order
                                <h6 class="card-body-title"></h6>
                                <p class="mg-b-20 mg-sm-b-30">Return Order List</p>
                                <div class="table-wrapper">
                                    <table id="datatable3" class="table display responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th class="wd-10p">Payment Type</th>
                                                <th class="wd-15p">Transction ID</th>
                                                <th class="wd-15p">SubTotal</th>
                                                <th class="wd-20p">Shipping</th>
                                                <th class="wd-20p">Total</th>
                                                <th class="wd-20p">Date</th>
                                                <th class="wd-20p">Return</th>
                                                <th class="wd-20p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order as $row)
                                            <tr>
                                                <td>{{ $row->payment_type }}</td>
                                                <td>{{ $row->blnc_transection }}</td>
                                                <td>{{ $row->subtotal }} $</td>
                                                <td>{{ $row->shipping }} $</td>
                                                <td>{{ $row->total }} $</td>
                                                <td>{{ $row->date }} </td>
                                                <td>
                                                    @if($row->return_order == 1)
                                                    <span class="badge badge-warning">Pending</span>
                                                    @elseif($row->return_order == 2)
                                                    <span class="badge badge-success">Success</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ URL::to('admin/approve/return/'.$row->id) }} "
                                                        class="btn btn-sm btn-info">Approve</a>
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
                </div>
            </div>
        </div>
        </body>
        @endsection
