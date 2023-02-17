@extends('layouts.app')


@section('body')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Reports</h5>
            </div>


                <button type="button" class="btn btn-primary no-sales">No Sales</button>
                <button type="button" class="btn btn-primary all-sales">All Sales</button>
                <button type="button" class="btn btn-primary item-sales">Item Sale</button>
                <button type="button" class="btn btn-primary sales-count">Sales count</button>

            <table class="table" id="table" >
                <thead id="t-head">
                </thead>
                <tbody id="t-body">
                </tbody>
            </table>



        </div>
    </div>
</div>

@endsection

@push('js')

    <script>
        $(function () {
            $(".no-sales").on('click', function() {
                // $("#mytable2").hide();

                $.ajax({
                    url: "{{ route('no-sales') }}",
                    type: "GET",
                    // dataType: 'json',
                    success: function (data) {

                        console.log(data);
                        $("#t-head").html('');

                        $('#t-head').append("<tr><th scope='col'>Name</th> <th scope='col'>DOB</th> <th scope='col'>Email</th> </tr>");

                        var body = '';
                        $.each(data, function (key, value) {

                            body += "<tr><td>" +
                                value.name + "</td><td>" +
                                value.dob + "</td><td>" +
                                value.email +
                                "</td></tr>";

                            // $("#t-body").append("<tr><td>" +
                            //     value.name + "</td><td>" +
                            //     value.dob + "</td><td>" +
                            //     value.email +
                            //     "</td></tr>");
                        });

                        $("#t-body").html(body);
                    }
                });

            });


            $(".sales-count").on('click', function() {
                // $("#mytable2").hide();

                $.ajax({
                    url: "{{ route('sales-count') }}",
                    type: "GET",
                    // dataType: 'json',
                    success: function (data) {

                        console.log(data);
                        $("#t-head").html('');

                        $('#t-head').append("<tr><th scope='col'>Name</th> <th scope='col'>DOB</th> <th scope='col'>Email</th><th scope='col'>Sale Count</th></tr>");

                        var body = '';
                        $.each(data, function (key, value) {
                             body += "<tr><td>" +
                                value.name + "</td><td>" +
                                value.dob + "</td><td>" +
                                value.email + "</td><td>" +
                                value.sales_count +
                                "</td></tr>";

                            // $("#t-body").append("<tr><td>" +
                            //     value.name + "</td><td>" +
                            //     value.dob + "</td><td>" +
                            //     value.email + "</td><td>" +
                            //     value.sales_count +
                            //     "</td></tr>");
                        });

                        $("#t-body").html(body);

                    }
                });

            });

            $(".item-sales").on('click', function() {
                // $("#mytable2").hide();

                $.ajax({
                    url: "{{ route('item-sales') }}",
                    type: "GET",
                    // dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $("#t-head").html('');

                        $('#t-head').append("<tr><th scope='col'>Product Name</th> <th scope='col'>Purchase Count</th> </tr>");

                        var body = '';
                        $.each(data, function (key, value) {
                            body += "<tr><td>" +
                                value.product_name + "</td><td>" +
                                value.number_of_sales +
                                "</td></tr>";
                            // $("#t-body").append("<tr><td>" +
                            //     value.product_name + "</td><td>" +
                            //     value.number_of_sales +
                            //     "</td></tr>");
                        });
                        $("#t-body").html(body);

                    }
                });

            });

            $(".all-sales").on('click', function() {
                // $("#mytable2").hide();

                $.ajax({
                    url: "{{ route('all-sales') }}",
                    type: "GET",
                    // dataType: 'json',
                    success: function (data) {

                        console.log(data);
                        $("#t-head").html('');

                        $('#t-head').append("<tr><th scope='col'>Invoice No</th> <th scope='col'>Product</th> <th scope='col'>Quantity</th> <th scope='col'>Name</th> <th scope='col'>Email</th> </tr>");

                        var body = '';
                        $.each(data, function (key, value) {

                            body +=  "<tr><td>" +
                                value.invoice_number	 + "</td><td>" +
                                value.product.product_name + "</td><td>" +
                                value.quantity + "</td><td>" +
                                value.customer.name + "</td><td>" +
                                value.customer.email +
                                "</td></tr>";
                            // $("#t-body").append("<tr><td>" +
                            //     value.invoice_number	 + "</td><td>" +
                            //     value.product.product_name + "</td><td>" +
                            //     value.quantity + "</td><td>" +
                            //     value.customer.name + "</td><td>" +
                            //     value.customer.email +
                            //     "</td></tr>");
                        });
                        $("#t-body").html(body);

                    }
                });

            });


        })

    </script>
@endpush
