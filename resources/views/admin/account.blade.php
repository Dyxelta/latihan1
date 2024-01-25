@extends('template.template')

@section('title')
    <title>Home Page</title>
@endsection

@section('head')
@endsection

@section('authButton')
@endsection

@section('content')
<div class="d-flex align-items-center justify-content-center p-4">
    <table class="table w-50">
        <thead>
            <tr class="text-center border-bottom-1 border-black">
                <th scope="col">Account</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $u)
                <tr class="border border-1 border-black">
                    <td class="border border-1 border-black">
                        <div class="d-flex justify-content-center text-start">
                            <p class="text-start w-50 m-0">{{ $u->firstName }} {{ $u->lastName }} - {{ $u->role }}</p>
                        </div>
                    </th>
                    <td class="border border-1 border-black">
                        <div class="d-flex justify-content-evenly">
                            <a href="{{ route('changeRole', $u->id) }}">Update Role</a>
                            <form action="{{ route('deleteUser', $u->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="border-0 btn p-0 m-0 text-primary text-decoration-underline d-flex align-items-center ">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
@endsection
