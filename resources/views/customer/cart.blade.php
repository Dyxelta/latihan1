@extends('template.template')

@section('title')
    <title>Cart Page</title>
@endsection

@section('head')
@endsection

@section('authButton')
@endsection

@section('content')
    <div class="p-4">
        <div>
            <h1 class="fw-bold text-decoration-underline ">Cart</h1>
        </div>
        <div class="container text-center">
            @forelse ($items as $cart)
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <div class="col">
                        <img  style="width: 6rem;" src="{{ url('assets/products/img.jpg') }}" alt="">
                    </div>
                    <p class="col m-0">{{ $cart->product->name }}</p>
                    <p class="col m-0">Rp{{ number_format($cart->product->price, 2, ',', '.') }}</p>
                    <form class="col d-flex justify-content-center text-center" action="{{ route('deleteCartItem', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="border-0 btn p-0 m-0 text-primary text-decoration-underline d-flex align-items-center text-center">
                            Delete
                        </button>
                    </form>
                </div>
            @empty
            @endforelse
            <div class="d-flex justify-content-end w-100 gap-4 px-5 mt-4">
                <h2>Total: Rp{{ number_format($total, 2, ',', '.') }}</h2>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning px-4">Check Out</button>
                </form>
            </div>
        </div>
    </div>
@endsection
