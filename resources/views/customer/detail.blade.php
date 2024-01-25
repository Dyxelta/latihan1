@extends('template.template')

@section('title')
    <title>Detail Page</title>
@endsection

@section('head')
@endsection

@section('authButton')
@endsection

@section('content')

    <div class="p-5">
        <div class="d-flex flex-row justify-content-center w-100 gap-5">
            <div class="d-flex flex-column align-items-center justify-content-center ">
                <h1 class="fs-5 fw-bold text-decoration-underline ">{{ $product->name }}</h1>
                <img src="{{ url('assets/products/img.jpg') }}" alt="">
            </div>
            <div class="d-flex align-items-center justify-content-center ">
                <div class="d-flex flex-column align-items-start ">
                    <p class="">Price: {{ number_format($product->price, 2, '.', ',') }}</p>
                    <p>{{ $product->desc }}</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ex eligendi ipsum vel possimus eveniet sunt magni nostrum molestiae error aut a, provident optio iste nesciunt! Quae perspiciatis nobis veniam enim recusandae, atque ex inventore minima, ab possimus neque optio. Officiis veniam, impedit voluptatibus, maiores laudantium possimus facere dignissimos mollitia odit quibusdam explicabo, ex saepe aliquid voluptatum cupiditate soluta modi eligendi quisquam ea? Reprehenderit maxime iste dolore perspiciatis, laborum modi voluptates consequatur autem numquam est aperiam officiis nemo fuga rem porro minus accusamus voluptate esse nihil ab fugit possimus dolor molestias! Optio sit, perspiciatis id ad quos ut at doloremque?</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end w-100 px-5">
            <form action="{{ route('addToCart', $product->id) }}" method="POST">
                @csrf
                <button class="btn btn-warning fw-bold fs-5 px-5">Buy</button>
            </form>
        </div>
    </div>

@endsection
