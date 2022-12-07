@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Banner</h2>
                    <a href="{{ route('banner.create')}}" class=" float-right btn btn-xl btn-outline-secondary"><i class="fa fa-plus"></i> Add Banner </a>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                @include('backend.layouts.notif')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Banner</strong> List</h2>
                        <p class="float-right">Total Banner: <strong>{{ \App\Models\Banner::count()}}</p></strong>

                        <!-- <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul> -->
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Condition</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banners as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{ $item->description }}</td>
                                        <td><img src="{{$item->photo}}" alt="banner-image" style="max-height: 90px; max-width: 90px;"></td>
                                        <td>
                                            @if($item->condition == 'banner')
                                            <span class="badge badge-success">{{$item->condition}}</span>
                                            @else
                                            <span class="badge badge-primary">{{$item->condition}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="checkbox" name="toogle" value='{{$item->id}}' data-toggle="switchbutton" {{ $item->status=='active' ? 'checked' : '' }} data-onlabel="active" data-offlabel="inactive" data-size='sm' data-onstyle="success" data-offstyle="danger">
                                        </td>
                                        <td>
                                            <a href="{{ route('banner.edit', $item->id) }}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fas fa-edit"></i></a>

                                            <form class="float-left ml-2" action="{{route('banner.destroy', $item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="" data-toggle="tooltip" title="delete" data-id="{{ $item->id }}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dltBtn').click(function(e) {
        var form = $(this).closest('form');
        var dataId = $(this).data('id');
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    });
</script>

<script>
    $('input[name=toogle]').change(function() {
        var mode = $(this).prop('checked');
        var id = $(this).val();
        // alert(id)
        // alert(mode);
        $.ajax({
            url: "{{ route('banner.status') }}",
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                mode: mode,
                id: id,
            },
            success: function(response) {
                if (response.status) {
                    alert(response.msg);
                } else {
                    alert('Harap dicoba kembali!');
                }
            }
        })
    })
</script>
@endsection