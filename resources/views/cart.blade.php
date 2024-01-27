@extends('layouts.master')

@section('title', 'Cart')

@section('content')
    <div class="flex items-center py-3">
        <h3 class="mr-3">Total Price: $5000</h3>
        <a href="#" class="btn btn-primary">Check Out</a>
    </div>

    <table class="table table-light">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Order Now</th>
                <th>Cancel</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>City Mansion</td>
                <td>$ 5000</td>
                <td>$ 10000</td>
                <td>
                    <form onsubmit="updateQuantity(event, 1)">
                        <input type="hidden" name="id" value="1" class="form-input">
                        <div class="flex items-center justify-between" style="display:flex;">
                            <button type="button" onclick="decrementQuantity(1)" class="btn btn-sm btn-decre">
                                <i class="fas fa-minus-square">-</i>
                            </button>
                            <input type="text" id="quantity_1" value="1" class="form-control w-16" readonly>
                            <button type="button" onclick="incrementQuantity(1)" class="btn btn-sm btn-incre">
                                <i class="fas fa-plus-square">+</i>
                            </button>
                        </div>

                    </form>
                </td>
                <td>
                    <button onclick="removeItem(1)" class="btn btn-sm btn-danger">Remove</button>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        function updateQuantity(event, productId) {
            event.preventDefault();

        }

        function incrementQuantity(productId) {
            var quantityInput = document.getElementById('quantity_' + productId);
            var quantity = parseInt(quantityInput.value, 10);
            quantity++;
            quantityInput.value = quantity;

        }

        function decrementQuantity(productId) {
            var quantityInput = document.getElementById('quantity_' + productId);
            var quantity = parseInt(quantityInput.value, 10);
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;

            }
        }

        function removeItem(productId) {

            var row = document.querySelector('tr[data-product-id="' + productId + '"]');
            row.parentNode.removeChild(row);
        }
    </script>
@endsection
