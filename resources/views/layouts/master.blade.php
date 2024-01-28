<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <span class="fs-3">Art</span>
                <span class="fs-3">Shop</span>
            </a>
            <div class="input-group w-50">
                <input type="text" id="artFilter" class="form-control" placeholder="Search your art here"
                    aria-label="art">
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Cart</a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(0, 132, 255); border-radius:8px;color:white;">

                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/">View</a>
                        </li>
                        <li class="nav-item py-2">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Signup</a>
                        </li>

                    @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function addToCart(productId) {
            // Implement your add to cart logic here (without database interaction)
            alert("Item added to cart! Product ID: " + productId);
        }

        function orderClick() {
            var userEmail = ''; // Set your user email here
            if (userEmail && userEmail !== '') {
                alert('Please log in to place an order art.');
            } else {
                alert('Please log in to place an order art.');
            }
        }

        $(document).ready(function() {
            $("#artFilter").on("keyup", function() {

            });
        });
    </script>

</body>

</html>
