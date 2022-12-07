@extends('backend.layouts.master')

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Banner</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Banner</li>
                        <li class="breadcrumb-item active">Edit Banner</li>
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
                        <form action="{{route('banner.update', $banner->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 ">
                                    <label for="">Title<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{$banner->title}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 ">
                                    <label for="">Description</label>
                                    <div class="form-group">
                                        <textarea class="form-control" id="description" placeholder="Write some description..." name="description" value="{{$banner->description}}"> </textarea>
                                    </div>
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
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12 ">
                                    <label for="">Condition</span></label>
                                    <select name="condition" class="form-control show-tick">
                                        <option value="">-- Condition --</option>
                                        <option value="banner" {{ $banner->condition == 'banner' ? 'selected' : '' }}>Banner</option>
                                        <option value="promo" {{ $banner->condition == 'promo' ? 'selected' : '' }}>Promo</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 ">
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Status --</option>
                                        <option value="active" {{ $banner->status =='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $banner->status =='inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">

                                    <button type="submit" class="btn btn-primary">Update</button>
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
@endsection