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
                                <h2 class="title-1">Seo Setting</h2><br><br><br>
                            </div>
                            <br>
                            <form method="post" action="{{ route('update.seo')}}">
                                @csrf
                                <div class="form-layout"> 
                                    <div class="row mg-b-25">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Meta Title: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="meta_title" value="{{ $seo->meta_title }}">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Meta Author: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="meta_author" value="{{ $seo->meta_author }}">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Meta Tag: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="meta_tag" value="{{ $seo->meta_tag }}">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Meta Description: <span
                                                        class="tx-danger">*</span></label>
                                                <textarea class="form-control"
                                                    name="meta_description">
                                                    {{ $seo->meta_description }}
                                                    </textarea>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Google Analyse <span
                                                        class="tx-danger">*</span></label>
                                                <textarea class="form-control"
                                                    name="google_analytics">
                                                    {{ $seo->google_analytics}}
                                                    </textarea>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Bing Analyse <span
                                                        class="tx-danger">*</span></label>
                                                <textarea class="form-control"
                                                    name="bing_analytics">
                                                    {{ $seo->bing_analytics }}
                                                    </textarea>
                                                    <input type="hidden" name="id" value="{{ $seo->id }}">
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
