@extends('admin.admin_layouts')

@section('admin_content')

<body class="animsition">
    <div class="page-wrapper">


        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- <div class="row justify-content-center align-items-center"> -->
            <!-- MAIN CONTENT-->
            <div class="sl-mainpanel">
                <div class="sl-pagebody">
                    <div class="col-lg-12">
                        <!-- Data Table -->

                        <div class="sl-pagebody">
                            <div class="top-campaign">
                                <div class="sl-page-title">
                                    <h2>Coupon Update
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
                                    <form method="post" action="{{ url('update/coupon/'.$coupon->id) }}">
                                        @csrf
                                        <div class="modal-body pd-20">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Coupon Code</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $coupon->coupon}}"
                                                    name="coupon">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Coupon Discount</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $coupon->discount }}"
                                                    name="discount">
                                            </div>
                                        </div><!-- modal-body -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
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
</body>





@endsection
