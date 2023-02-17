@extends('layouts.app')


@section('body')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Products</h5>
                <a href="{{ route("products.create") }}" type="submit" class="btn btn-primary">Create Product</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ optional($product->category)->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <a class="delete" href="{{ route('products.destroy', $product->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $(function () {

            $('.delete').on('click', function (e) {
                e.preventDefault();

                let href = $(this).attr('href');

                if (confirm("Are you sure?")) {
                    $.ajax({
                        type: "DELETE",
                        url: href,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data){
                            location.reload();
                        }
                    });
                }
                return false;
            })
        })
    </script>
@endpush
