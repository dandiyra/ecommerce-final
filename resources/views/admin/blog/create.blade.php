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
                            <div class="overview-wrap">
                                <h2 class="title-1">New Post Add From</h2><br><br><br>
                                <a href="{{ route('all.blogpost')}}" class="btn btn-success btn-sm pull-right"> All
                                    Post</a>
                            </div>
                            <br>
                            <form method="post" action="{{ route('store.post')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Post Title (ENGLISH): <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="post_title_en"
                                                    placeholder="Enter Post Title in English">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Post Title (Indonesia): <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="post_title_in"
                                                    placeholder="Enter Post Title in Indonesia">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group mg-b-10-force">
                                                <label class="form-control-label"> Blog Category: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control select2" data-placeholder="Choose country"
                                                    name="category_id">
                                                    <option label="Choose Category"></option>
                                                    @foreach($blogcategory as $row)
                                                    <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Product Details (ENGLISH): <span
                                                        class="tx-danger">*</span></label>
                                                <textarea class="form-control" id="summernote"
                                                    name="details_en"></textarea>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Product Details (Indonesia): <span
                                                        class="tx-danger">*</span></label>
                                                <textarea class="form-control" id="summernote1"
                                                    name="details_in"></textarea>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Post Image: <span
                                                        class="tx-danger">*</span></label>
                                                <label class="custom-file">
                                                    <input type="file" id="file" class="custom-file-input"
                                                        name="post_image" onchange="readURL(this);">
                                                    <span class="custom-file-control"></span>
                                                    <img src="#" id="one">
                                                </label>
                                            </div>
                                        </div><!-- col-4 -->
                                    </div><!-- row -->
                                </div><!-- end row -->
                                <br><br>
                                <div class="form-layout-footer">
                                    <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
                                </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                    </div><!-- card -->
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

        @endsection
