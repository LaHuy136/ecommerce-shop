@extends('frontend.layouts.layout')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Account</h2>
                        <div class="panel-group category-products" id="accordian">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{ url('/account') }}">Account</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{ url('/my-product') }}">My product</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="id">ID</td>
                                    <td class="image">Image</td>
                                    <td class="description">Name</td>
                                    <td class="price">Price</td>
                                    <td class="total">Action</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="cart_product">
                                        <a href=""><img src="{{ asset('frontend/images/cart/one.png') }}"
                                                alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">Colorblock Scuba</a></h4>

                                    </td>
                                    <td class="cart_price">
                                        <p>$59</p>
                                    </td>

                                    <td>
                                        <a>
                                            <i style="font-size:18px" class="fa">&#xf044;</i>
                                        </a>
                                    </td>

                                    <td>
                                        <a>
                                            <i style="font-size:18px" class="fa">&#xf00d;</i>
                                        </a>
                                    </td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="cart_product">
                                        <a href=""><img src="{{ asset('frontend/images/cart/one.png') }}"
                                                alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">Colorblock Scuba</a></h4>

                                    </td>
                                    <td class="cart_price">
                                        <p>$59</p>
                                    </td>

                                    <td class="cart_total">
                                        <a>edit</a>
                                        <a>delete</a>
                                    </td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="cart_product">
                                        <a href=""><img src="{{ asset('frontend/images/cart/one.png') }}"
                                                alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">Colorblock Scuba</a></h4>

                                    </td>
                                    <td class="cart_price">
                                        <p>$59</p>
                                    </td>

                                    <td class="cart_total">
                                        <a href="{{ url('/edit-product') }}">edit</a>
                                        <a href="{{ url('/delete-product') }}">delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group" style="float: right">
                        <button class="btn btn-default" style="background-color: #FE980F; color: white;">Add new
                            product</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
