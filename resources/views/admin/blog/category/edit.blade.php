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
                            <h2 class="title-1">Blog Category Update</h2>
                            </h2>
                    
                            <div class="table-wrapper">
                                <table id="datatable3" class="table display responsive nowrap">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form method="post" action="{{ url('update/blog/category/'.$blogcatedit->id) }}">
                                        @csrf
                                        <div class="modal-body pd-20">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name English</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp"
                                                    value="{{ $blogcatedit->category_name_en }}"
                                                    name="category_name_en">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name Indonesia</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp"
                                                    value="{{ $blogcatedit->category_name_in }}"
                                                    name="category_name_in">
                                            </div>
                                            </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                            </div>
                            </form>
                        </div>
                    </div><!-- modal-dialog -->
                </div><!-- modal -->
            </div>
        </div><!-- sl-mainpanel -->
    </div>
</div>

</div>






@endsection
