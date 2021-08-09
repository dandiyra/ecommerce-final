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
                            <h2 class="title-1">Search Report
                            </h2><br>
                            <h6 class="card-body-title"></h6>
                            <p class="mg-b-20 mg-sm-b-30">Order List</p>
                            <div class="table-wrapper">
                                <form method="post" action="{{ route('search.by.date') }}">
                                    @csrf
                                    <div class="modal-body pd-20">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Search By Date</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="date">
                                        </div>
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>

                                    </div>
                                </form>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                        <!--  END TOP CAMPAIGN-->
                    </div>
                    <div class="col-md-12">
                        <div class="map-data m-b-50 ">
                            <div class="table-wrapper">
                                <form method="post" action="{{ route('search.by.month') }}">
                                    @csrf
                                    <div class="modal-body pd-20">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Search By Month</label>

                                            <select class="form-control" name="month">
                                                <option value="january">January</option>
                                                <option value="february">February</option>
                                                <option value="march">March</option>
                                                <option value="april">April</option>
                                                <option value="may">May</option>
                                                <option value="june">June</option>
                                                <option value="july">July</option>
                                                <option value="august">August</option>
                                                <option value="september">September</option>
                                                <option value="october">October</option>
                                                <option value="november">November</option>
                                                <option value="december">December</option>
                                            </select>
                                        </div>
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                    </div>
                                </form>
                            </div><!-- table-wrapper -->
                        </div>
                        <!--  END TOP CAMPAIGN-->
                    </div>
                    <div class="col-md-12">
                        <div class="map-data m-b-50 ">
                            <div class="table-wrapper">
                                <form method="post" action="{{ route('search.by.year') }}">
                                    @csrf
                                    <div class="modal-body pd-20">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Search By Year</label>
                                            <select class="form-control" name="year">
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                        </div>
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                    </div>
                                </form>
                            </div><!-- table-wrapper -->
                        </div>
                        <!--  END TOP CAMPAIGN-->
                    </div>
                </div><!-- sl-mainpanel -->
                <!-- </div> -->
            </div>
        </div>
        @endsection
