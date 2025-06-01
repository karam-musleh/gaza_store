@extends('admin.master')
@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit Products</h1>
    <form action="{{ route('admin.products.update', $product->id) }} " method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.products._form')
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

        }
    </script>

@endsection
