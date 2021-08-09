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
                                <h2 class="title-1">Subscribiing
                                <a href="#" class="btn btn-sm btn-warning" style="float:right"
                                            data-toggle="modal" data-target="#modaldemo3">Delete All</a>
                                </h2><br>
                            <!-- </div> -->

                            <!-- <div class="card pd-20 pd-sm-40"> -->
                            <h6 class="card-body-title"></h6>
                            <p class="mg-b-20 mg-sm-b-30">Subscribiing List</p>
                                    <div class="table-wrapper">
                                        <table id="datatable3" class="table display responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="wd-15p">ID</th>
                                                    <th class="wd-15p">Email</th>
                                                    <th class="wd-15p">Subscribiing Time</th>
                                                    <th class="wd-20p">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $sub as $key=>$row )
                                                <tr>
                                                    <td> <input type="checkbox"> {{ $key +1 }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans() }}</td>
                                                    <td>
                                                        <a href="{{ URL::to('delete/sub/'.$row->id)}}"
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
            <form method="post" action="{{ route('store.category') }}">
                @csrf
                <div class="modal-body pd-20">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Category" name="category_name">
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
