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
                            <h2 class="title-1">Brand
                                <a href="#" class="btn btn-sm btn-warning" style="float:right" data-toggle="modal"
                                    data-target="#modaldemo3">Add New</a>
                            </h2><br>
                            <!-- </div> -->

                            <!-- <div class="card pd-20 pd-sm-40"> -->
                            <h6 class="card-body-title"></h6>
                            <p class="mg-b-20 mg-sm-b-30">Brand List</p>

                            <div class="table-wrapper">
                                <table id="datatable3" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">ID</th>
                                            <th class="wd-15p">Brand Name</th>
                                            <th class="wd-15p">Brand Logo</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $brand as $key=>$row )
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $row->brand_name }}</td>
                                            <td><img src="{{ URL::to($row->brand_logo)}}" height="70px;" width="80px">
                                            </td>
                                            <td>
                                                <a href="{{ URL::to('edit/brand/'.$row->id)}}"
                                                    class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ URL::to('delete/brand/'.$row->id)}}"
                                                    class="btn btn-sm btn-danger" id="delete">Delete</a>
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
        </body>

        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form Modals -->
                    <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="brand" name="brand_name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
                                <input type="file" class="form-control" aria-describedby="emailHelp"
                                    placeholder="brand logo" name="brand_logo">
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->




        @endsection
