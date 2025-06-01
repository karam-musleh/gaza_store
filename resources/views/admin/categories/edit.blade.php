@extends('admin.master')
@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit Categories</h1>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.categories._form')
        <button class="btn btn-info"><i class="fas fa-save"></i> updated</button>

    </form>
@endsection


@section('title', 'Dashboard')
@section('js')

    <script>
        function showImage(e) {
            console.log(e.target.files);
            const [file] = e.target.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }

            function delImg(e, id) {
                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.delete_img') }} /' + id,
                    success: (res) => {
                        if (res) {
                            e.target.parentElement.remove();
                        }
                    },
                    error: (err) => {
                        console.log(err);
                    }
                })


            }
        }
    </script>

@endsection
