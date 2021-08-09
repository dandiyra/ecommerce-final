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
                            <!-- <div class="overview-wrap"> -->
                            <h2 class="title-1">Post List</h2>
                            </h2>
                            <!-- </div> -->
                            <h6 class="card-body-title"></h6>
                            <p class="mg-b-20 mg-sm-b-30">Post List</p>
                            <a href="{{ route('add.blogpost') }}" class="btn btn-warning btn-sm pull-right mb-3">Add New
                                Post</a>
                            </h6>
                            <div class="table-wrapper">
                                <table id="datatable3" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Post Title</th>
                                            <th class="wd-15p">Post Category</th>
                                            <th class="wd-15p">Image </th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($post as $row)
                                        <tr>
                                            <td>{{ $row->post_title_en }}</td>
                                            <td>{{ $row->category_name_en }}</td>
                                            <td> <img src="{{ URL::to($row->post_image) }}"
                                                    style="height: 50px; width: 50px;"> </td>
                                            <td>
                                                <a href="{{ URL::to('edit/post/'.$row->id) }}"
                                                    class="btn btn-sm btn-info" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ URL::to('delete/post/'.$row->id) }}"
                                                    class="btn btn-sm btn-danger" title="Delete" id="delete">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                    </div><!-- sl-mainpanel -->
                </div>
            </div>
        </div>
