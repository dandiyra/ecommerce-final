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
                        <div class="sl-pagebody">
                                <div class="sl-page-title">
                                    <h2>Category Update
                                    </h2>
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
                                    <form method="post" action="{{ url('update/category/'.$category->id) }}">
                                        @csrf
                                        <div class="modal-body pd-20">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $category->category_name}}"
                                                    name="category_name">
                                            </div>
                                        </div><!-- modal-body -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
                                        </div>
                                    </form>
                                </div><!-- table-wrapper -->
                            </div>
                    </div><!-- sl-mainpanel -->
                    <!-- </div> -->
                </div>

            </div>
</body>





@endsection
