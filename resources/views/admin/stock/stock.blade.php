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
                            <h2 class="title-1">Stock Product List
                            </h2><br>
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Product Code</th>
                                            <th class="wd-15p">Product Name</th>
                                            <th class="wd-15p">Image</th>
                                            <th class="wd-15p">Category</th>
                                            <th class="wd-15p">Brand</th>
                                            <th class="wd-15p">Quantity</th>
                                            <th class="wd-15p">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product as $row)
                                        <tr>
                                            <td>{{ $row->product_code }}</td>
                                            <td>{{ $row->product_name }}</td>
                                            <td> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;">
                                            </td>
                                            <td>{{ $row->category_name }}</td>
                                            <td>{{ $row->brand_name }}</td>
                                            <td>{{ $row->product_quantity }}</td>
                                            <td>
                                                @if($row->status == 1)
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
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
