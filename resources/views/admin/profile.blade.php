@extends('admin.master')
@section('css')
    <style>
        .prev-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            padding: 5px;
            border: 1px dashed #dadada;
            cursor: pointer;
            transition: all .3s ease
        }

        .prev-img:hover {
            opacity: .8;
        }
    </style>

@endsection
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Profile Page</h1>
    <form action="{{ route('admin.profile_data') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        {{-- <div class="prev-img-modal">
    <img src="https://via.placeholder.com/300*300" alt="">
 </div> --}}


        <div class="row">
            <div class="col-md-3">
                @php
                    if ($admin->image) {
                        $src = asset('images/' . $admin->image->path);
                    } else {
                        $src = 'https://ui-avatars.com/api/?name=' . $admin->name . '&background=random';
                    }
                @endphp

                <label for="image"><img title="Edit your photo" class="prev-img" src="{{ $src }}" alt=""
                        id="prevImg"></label>
                <input type="file" onchange="showImg(event)" name="image" id="image" style="display: none">
            </div>
            <div class="col-md-9">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                @if (session('msg'))
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $admin->name) }}">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" disabled value="{{ $admin->email }}">
                </div>
                <br>
                <h4>Updated your password</h4>
                <div class="mb-3">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="current_password" id="current">
                </div>
                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" disabled class="form-control new" name="password">
                </div>
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" disabled class="form-control new" name="password_confirmation">
                </div>
                <button class="btn btn-success"><i class="fas fa-save"></i> Update</button>

            </div>

        </div>

    </form>
@endsection


@section('title', 'Dashboard')


@section('js')
    <script>
        function showImg(e) {
            const file = e.target.files[0]
            if (file) {
                prevImg.src = URL.createObjectURL(file)
            }
        }

        $('#current').keyup(function() {
            if ($(this).val().length > 0) {
                $('.new').prop('disabled', false)

            } else {
                $('.new').prop('disabled', true)
                $('.new').val('')
            }

        })
        //             if($(this).val().length > 0){
        //                 $('.new').prop('disabled',false)

        //             }else
        //             {
        //                 $('.new').prop('disabled',true)
        //                 $('.new').val('')
        //    }
    </script>
@endsection
