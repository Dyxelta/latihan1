@extends('template.template')

@section('title')
    <title>Home Page</title>
@endsection

@section('head')
@endsection

@section('authButton')
@endsection

@section('content')
    <div class='d-flex flex-column align-items-center justify-content-center w-100 p-4'>
        <div class='d-flex flex-wrap gap-4 px-5'>
            @forelse ($products as $p)
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('assets/products/img.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p->name }}</h5>
                        <p class="card-text">{{ $p->desc }}</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
@endsection
