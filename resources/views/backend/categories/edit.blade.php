@extends('backend.layouts.master')

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Kategori</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item active">Edit Kategori</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">


                    <div class="body">
                        <form action="{{route('category.update', $category->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 ">
                                    <label for="">Title<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{$category->title}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 ">
                                    <label for="">Summary</label>
                                    <div class="form-group">
                                        <textarea class="form-control" id="description" placeholder="Write some description..." name="summary" value="{{$category->summary}}"> </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 ">

                                    <div class="form-group">
                                        <label for="">Is Parent : </label>
                                        <input type="checkbox" id="is_parent" name="is_parent" value="1"> Iya
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 {{$category->is_parent==1 ? 'd-none' : ''}} " id="parent_cat_div">
                                    <label for="parent_id">Kategori Parent</span></label>
                                    <select name="parent_id" class="form-control show-tick">
                                        <option value="">-- Kategori Parent --</option>
                                        @foreach($parent_cats as $pcats)
                                        <option value="{{$pcats->id}}" {{ $pcats->id == $category->parent_id ? 'selected' : '' }}>{{$pcats->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 ">
                                    <label for="">Photo</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$category->photo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 ">
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Status --</option>
                                        <option value="active" {{ $category->status =='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $category->status =='inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div> -->


                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">

                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="submit" class="btn btn-outline-secondary">Cancel</button>

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    $('#lfm').filemanager('image');
</script>

<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
</script>

<script>
    $('#is_parent').change(function(e) {
        e.preventDefault();
        var is_checked = $('#is_parent').prop('checked');
        // alert(is_checked);
        if (is_checked) {
            $('#parent_cat_div').addClass('d-none');
        } else {
            $('#parent_cat_div').removeClass('d-none');
        }
    })
</script>
@endsection