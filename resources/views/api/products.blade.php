<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h2>Products From API</h2>
        <table class="table">
            <tr>
                <th>#</th>
                <th> Name</th>
                <th> Image</th>
                <th> Brand</th>
                <th> Price</th>
                <th> Rating</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['title'] }}</td>
                    <td><img width="90" src="{{ $product['thumbnail'] }}" alt=""></td>
                    {{-- <td>{{ $product['brand'] }}</td> --}}
                    <td>{{ $product['brand'] ?? 'No Brand' }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['rating'] }}</td>


                </tr>
            @endforeach

        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
