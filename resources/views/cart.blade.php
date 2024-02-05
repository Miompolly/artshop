@extends('layouts.master')

@section('title', 'Cart')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-body">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- This part will be dynamically populated with cart items -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" style="text-align:right;">
                                    <h3><strong id="cartTotal">Total $0</strong></h3>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
