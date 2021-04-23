@extends('layouts.main')

@section('content')
<div class="w-full flex justify-center">
    <div class="w-full md:w-2/3 lg:w-1/3 bg-white p-6 rounded-lg">
        <h1 class="font-bold text-3xl">Create New User</h1>
        <form action="{{ route('admin.users.store' )}}" method="POST">
            @include('admin.users.partials.form', ['create' => true])
        </form>
    </div>
</div>
@endsection