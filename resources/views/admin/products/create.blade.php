@extends('admin.master')
@section('content')

    <h1 class="h3 mb-4 text-gray-800">Add New Product</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.products._form')

        <button class="btn btn-success"><i class="fas fa-save"></i> Add</button>

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
