<!-- resources/views/products.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
     <!-- Available Products -->
    @if (count($products) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Available Products
            </div>

            <div class="panel-body">
                <table class="table table-striped product-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Product</th>
                        <th>Brand</th>
                        <th>Price</th>
						<th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <!-- Product Name -->
                                <td class="table-text">
                                    <div>{{ $product->name }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $product->brand["name"] }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $product->price }}</div>
                                </td>

                                <td>
                                    <div><button class="btn btn-primary" onclick="buy({{ $product->id }});">buy</button></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
	<div hidden>
		<form id="purchaseForm" method="POST" action="{{ url('checkout') }}">
			{{ csrf_field() }}
			<input type="text" id="productInput" name="product">
		</form>
	</div>
<script>
	function buy(product){
		
		document.getElementById("productInput").value = product;
		document.getElementById("purchaseForm").submit();
	}
</script>
@endsection