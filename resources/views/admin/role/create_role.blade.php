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
                            <h2 class="title-1">Admin Section
                            </h2><br>
                            <h6 class="card-body-title">New Admin </h6>
                            <p class="mg-b-20 mg-sm-b-30">New Admin Add From</p>

                            <form method="post" action="{{ route('store.admin') }}">
                                @csrf
                                </h6>
                                <br>
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label"> Name: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="name"
                                                    placeholder="Enter User Name" required="">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Phone: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="phone"
                                                    placeholder="Enter Phone" required="">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Email: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="email" name="email"
                                                    placeholder="Enter Your Email" required="">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Password: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="Enter Password" required="">
                                            </div>
                                        </div><!-- col-4 -->
                                    </div><!-- row -->
                                    <hr>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="category" value="1">
                                                <span>Category</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="coupon" value="1">
                                                <span>Coupon</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="product" value="1">
                                                <span>Product</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="blog" value="1">
                                                <span> Blog </span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="order" value="1">
                                                <span>Order</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="other" value="1">
                                                <span>Other </span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="report" value="1">
                                                <span> Report</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="role" value="1">
                                                <span> Role</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="return" value="1">
                                                <span> Return</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="contact" value="1">
                                                <span> Contact</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="comment" value="1">
                                                <span> Comment</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="setting" value="1">
                                                <span> Setting</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="stock" value="1">
                                                <span> Stock</span>
                                            </label>
                                        </div> <!-- col-4 -->
                                    
                                    </div><!-- end row -->
                                    <br><br>
                                    <div class="form-layout-footer">
                                        <button type="submit" class="btn btn-info mg-r-5">Submit </button>

                                    </div><!-- form-layout-footer -->
                                    </tbody>
                                    </table>
                                </div><!-- table-wrapper -->
                        </div>
                    </div>
                </div><!-- sl-mainpanel -->
                </div>
            </div>
        </div>
        @endsection
