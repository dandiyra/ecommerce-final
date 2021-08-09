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
                            <!-- <div class="overview-wrap"> -->
                            <h2 class="title-1">Product
                                <a href="{{ route('add.product') }}" class="btn btn-sm btn-warning"
                                    style="float:right;">Add New</a>
                            </h2><br>
                            <!-- </div> -->

                            <!-- <div class="card pd-20 pd-sm-40"> -->
                            <h6 class="card-body-title"></h6>
                            <p class="mg-b-20 mg-sm-b-30">Product List</p>

                            <div class="table-wrapper">
                                <table id="datatable3" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Product Code</th>
                                            <th class="wd-15p">Product Name</th>
                                            <th class="wd-15p">Image</th>
                                            <th class="wd-15p">Category</th>
                                            <th class="wd-15p">Brand</th>
                                            <th class="wd-15p">Quantity</th>
                                            <th class="wd-15p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $product as $row )
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
                                            <td>
                                                <a href="{{ URL::to('edit/product/'.$row->id)}}"
                                                    class="btn btn-sm btn-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="{{ URL::to('delete/product/'.$row->id)}}"
                                                    class="btn btn-sm btn-danger" title="Delete" id="delete"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="{{ URL::to('view/product/'.$row->id)}}"
                                                    class="btn btn-sm btn-info" title="Show"><i class="fa fa-eye"></i></a>
                                                @if($row->status == 1)
                                                <a href="{{ URL::to('unactive/product/'.$row->id)}}"
                                                    class="btn btn-sm btn-warning" title="Unactive"><i
                                                        class="fa fa-check-circle"></i></a>
                                                @else
                                                <a href="{{ URL::to('active/product/'.$row->id)}}"
                                                    class="btn btn-sm btn-warning" title="Active"><i
                                                        class="fa fa-window-close"></i></a>
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
