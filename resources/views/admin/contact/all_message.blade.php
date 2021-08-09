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
                            <h2 class="title-1">Message Table
                            </h2><br>
                            <h6 class="card-body-title">Message List
                            </h6>
                            <br>
                            <div class="table-wrapper">
                                <table id="datatable3" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Name</th>
                                            <th class="wd-15p">Phone</th>
                                            <th class="wd-15p">Email</th>
                                            <th class="wd-20p">Message</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($message as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->email }} </td>
                                            <td>{{ $row->message }} </td>
                                            <td>
                                                <a href=" " class="btn btn-sm btn-info">View</a>
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
