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
                        <div class="map-data m-b-50">
                            <!-- Data Table -->

                            <div class="sl-pagebody">
                                <div class="sl-page-title">
                                    <h2>Brand Update
                                    </h2>
                                    <br>
                                </div><!-- sl-page-title -->
                                <!-- <div class="top-campaign"> -->
                                <div class="table-wrapper">
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
                                    <form method="post" action="{{ url('update/brand/'.$brand->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body pd-20">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $brand->brand_name}}"
                                                    name="brand_name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
                                                <input type="file" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $brand->brand_name}}"
                                                    name="brand_logo">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Old Brand
                                                    Logo</label>
                                                <img src="{{ URL::to ($brand->brand_logo)}}" height="70px;"
                                                    width="90px;">
                                                <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}"
                                                    </div> </div> <!-- modal-body -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info pd-x-20">Update</button>
                                                </div>
                                    </form>
                                </div><!-- table-wrapper -->
                            </div>
                        </div><!-- sl-mainpanel -->
                        <!-- </div> -->
                    </div>

                </div>
            





                @endsection
