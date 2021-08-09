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
                            <h2 class="title-1">Admin Table
                            </h2><br>
                            <h6 class="card-body-title">Admin List
                                <a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning"
                                    style="float: right;">Add New</a>
                            </h6>
                            <br>
                            <div class="table-wrapper">
                                <table id="datatable3" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Name</th>
                                            <th class="wd-15p">Phone</th>
                                            <th class="wd-15p">Access</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>
                                                @if($row->category == 1)
                                                <span class="badge btn-danger">Category </span>
                                                @else
                                                @endif

                                                @if($row->coupon == 1)
                                                <span class="badge btn-info">coupon </span>
                                                @else
                                                @endif

                                                @if($row->product == 1)
                                                <span class="badge btn-warning">product </span>
                                                @else
                                                @endif

                                                @if($row->blog == 1)
                                                <span class="badge btn-primary">blog </span>
                                                @else
                                                @endif

                                                @if($row->order == 1)
                                                <span class="badge btn-success">order </span>
                                                @else
                                                @endif

                                                @if($row->other == 1)
                                                <span class="badge btn-danger">other </span>
                                                @else
                                                @endif

                                                @if($row->report == 1)
                                                <span class="badge btn-info">report </span>
                                                @else
                                                @endif

                                                @if($row->role == 1)
                                                <span class="badge btn-warning">role </span>
                                                @else
                                                @endif

                                                @if($row->return == 1)
                                                <span class="badge btn-primary">return </span>
                                                @else
                                                @endif

                                                @if($row->contact == 1)
                                                <span class="badge btn-success">contact </span>
                                                @else
                                                @endif

                                                @if($row->comment == 1)
                                                <span class="badge btn-danger">comment </span>
                                                @else
                                                @endif

                                                @if($row->setting == 1)
                                                <span class="badge btn-info">setting </span>
                                                @else
                                                @endif

                                                @if($row->stock == 1)
                                                <span class="badge btn-info">stock </span>
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ URL::to('edit/admin/'.$row->id) }} "
                                                    class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ URL::to('delete/admin/'.$row->id) }}"
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
        @endsection
