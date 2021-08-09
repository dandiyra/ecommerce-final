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
                            <h2 class="title-1">Blog Category Table</h2>
                            <a href="#" class="btn btn-sm btn-warning" style="float:right" data-toggle="modal"
                                data-target="#modaldemo3">Add New Category</a>
                            </h2>
                            <!-- </div> -->
                            <h6 class="card-body-title"></h6>
                            <p class="mg-b-20 mg-sm-b-30">Blog Category List</p>
                            <div class="table-wrapper">
                                <table id="datatable3" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">ID</th>
                                            <th class="wd-15p">Category Name En</th>
                                            <th class="wd-15p">Category Name Id</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogcat as $key=>$row)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $row->category_name_en }}</td>
                                            <td>{{ $row->category_name_in }}</td>
                                            <td>
                                                <a href="{{ URL::to('edit/blogcategory/'.$row->id) }} "
                                                    class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ URL::to('delete/blogcategory/'.$row->id) }}"
                                                    class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                    <form method="post" action="{{ route('store.blog.category') }}">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name English</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Category Name English"
                                    name="category_name_en">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name Indonesia</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Category Name Indonesia"
                                    name="category_name_in">

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
