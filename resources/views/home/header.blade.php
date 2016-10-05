<div class="site-branding-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="logo col-lg-offset-2">
                        <h1>
                            <a href="">
                                <img src="https://www.foodbankccs.org/images/logos/for-download/FBCCS-Logo.png" class="img-logo">
                            </a>
                        </h1>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="shopping-item">
                        <a href="{{ action('Home\ShoppingCartController@index') }}">{{ trans('homepage.cart') }} -
                            <span class="cart-amunt">{{ $subTotal }}</span> {{ trans('homepage.dollar') }}
                                <i class="fa fa-shopping-cart"></i>
                            <span class="product-count">{{ $totalCartItems }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only"{{ trans('homepage.toggle') }}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active homepage-menu">
                            <a href="{{ action('Home\HomeController@index') }}">
                                {{ trans('homepage.home') }}
                            </a>
                        </li>
                        <li class="category-menu">
                            <a href="{{ action('Home\CategoriesController@index') }}">
                                {{ trans('homepage.category') }}
                            </a>
                        </li>
                        <li class="cart-menu">
                            <a href="{{ action('Home\ShoppingCartController@index') }}">
                            {{ trans('homepage.cart') }}
                            </a>
                        </li>
                        <li class="checkout-menu">
                            <a href="{{ action('Home\OrderController@index') }}">
                                {{ trans('homepage.checkout') }}
                            </a>
                        </li>
                        <li>
                            <a href="">{{ trans('suggestion') }}</a>
                        </li>
                        <li>
                            <a href="">{{ trans('homepage.contact') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
