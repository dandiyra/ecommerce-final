@extends('admin.admin_layouts')
<!-- Tags Input CDN css -->
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
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
                            <div class="overview-wrap">
                                <h2 class="title-1">New Product Form</h2><br><br><br>
                                <a href="{{ route('all.product')}}" class="btn btn-success btn-sm pull-right">All Product</a>
                            </div>
                            <br>
                            <form method="post" action="{{ route('store.product') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Product Name: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="product_name" placeholder=" enter product name">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Product Code: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="product_code"  placeholder="enter product code">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Quantity: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="product_quantity"  placeholder="product quantity">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Discount Price: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="discount_price"  placeholder="discount price">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group mg-b-10-force">
                                                <label class="form-control-label">Category: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control select2" data-placeholder="Choose country"
                                                    name="category_id">
                                                    <option label="Choose Category"></option>
                                                    @foreach($category as $row)
                                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group mg-b-10-force">
                                                <label class="form-control-label">Sub Category: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control select2" data-placeholder="Choose country"
                                                    name="subcategory_id">
                                                </select>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group mg-b-10-force">
                                                <label class="form-control-label">Brand: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control select2" data-placeholder="Choose country"
                                                    name="brand_id">
                                                    <option label="Choose Brand"></option>
                                                    @foreach($brand as $br)
                                                    <option value="{{ $row->id }}">{{ $br->brand_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Product Size: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="product_size" id="size"
                                                    data-role="tagsinput">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Product Color: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="product_color" id="color"
                                                    data-role="tagsinput">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Selling Price: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="selling_price">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Product Details: <span
                                                        class="tx-danger">*</span></label>
                                                        <textarea class="form-control" id="summernote" name="product_details"> </textarea>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Video Link: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" name="video_link" placeholder="video link">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Image One (Main Thumbnail): <span
                                                        class="tx-danger">*</span></label>
                                                <label class="custom-file">
                                                    <input type="file" id="file" class="custom-file-input"
                                                        name="image_one" onchange="readURL(this);" required="">
                                                    <span class="custom-file-control"></span>
                                                    <img src="#" id="one">
                                                </label>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Image Two: <span
                                                        class="tx-danger">*</span></label>
                                                <label class="custom-file">
                                                    <input type="file" id="file" class="custom-file-input"
                                                    name="image_two" onchange="readURL2(this);" required="">
                                                    <span class="custom-file-control"></span>
                                                    <img src="#" id="two">
                                                </label>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Image Three: <span
                                                        class="tx-danger">*</span></label>
                                                <label class="custom-file">
                                                    <input type="file" id="file" class="custom-file-input"
                                                    name="image_three" onchange="readURL3(this);" required="">
                                                    <span class="custom-file-control"></span>
                                                    <img src="#" id="three">
                                                </label>
                                            </div>
                                        </div><!-- col-4 -->
                                    </div><!-- row -->
                                    <br>
                                    <br>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="main_slider" value="1">
                                                <span>Main Slider</span>
                                            </label>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="hot_deal" value="1">
                                                <span>Hot Deal</span>
                                            </label>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="best_rated" value="1">
                                                <span>Best Rated</span>
                                            </label>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="trend" value="1">
                                                <span>Trend Product</span>
                                            </label>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="mid_slider" value="1">
                                                <span>Mid Slider</span>
                                            </label>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="hot_new" value="1">
                                                <span>Hot New</span>
                                            </label>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <label class="ckbox">
                                                <input type="checkbox" name="buyone_getone" value="1">
                                                <span>Buyone Getone</span>
                                            </label>
                                        </div><!-- col-4 -->
                                    </div><!-- end row -->
                                    <br><br>
                                    <div class="form-layout-footer">
                                        <button class="btn btn-info mg-r-5">Submit Form</button>
                                        <button class="btn btn-secondary">Cancel</button>
                                    </div><!-- form-layout-footer -->
                                </div><!-- form-layout -->
                                <!-- </div>card -->
                            </form>
                        </div>
                    </div>
                    <!-- END MAIN CONTENT-->
                    <!-- END PAGE CONTAINER-->
                </div>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
                <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $('select[name="category_id"]').on('change', function () {
                            var category_id = $(this).val();
                            if (category_id) {
                                $.ajax({
                                    url: "{{ url('/get/subcategory/') }}/" + category_id,
                                    type: "GET",
                                    dataType: "json",
                                    success: function (data) {
                                        var d = $('select[name="subcategory_id"]').empty();
                                        $.each(data, function (key, value) {

                                            $('select[name="subcategory_id"]')
                                                .append('<option value="' + value
                                                    .id + '">' + value
                                                    .subcategory_name + '</option>'
                                                );
                                        });
                                    },
                                });
                            } else {
                                alert('danger');
                            }
                        });
                    });

                </script>

                <script type="text/javascript">
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $('#one')
                                    .attr('src', e.target.result)
                                    .width(80)
                                    .height(80);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                </script>
                 <script type="text/javascript">
                    function readURL2(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $('#two')
                                    .attr('src', e.target.result)
                                    .width(80)
                                    .height(80);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                </script>
                 <script type="text/javascript">
                    function readURL3(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $('#three')
                                    .attr('src', e.target.result)
                                    .width(80)
                                    .height(80);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                </script>
                @endsection
