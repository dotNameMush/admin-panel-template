@extends('layouts.main')

@section('content')
            <!--Veiw Users Table-->
            <section class="w-full">
                <div class="w-full h-screen text-gray-900 bg-gray-200">
                    <div class="p-4 flex">
                        <h1 class="text-3xl text-center">Users List</h1>
                    </div>
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Name</th>
                                    <th class="text-left p-3 px-5">Username</th>
                                    <th class="text-left p-3 px-5">Email</th>
                                    @can('is-admin')
                                    <th class="text-left p-3 px-5">Phone</th>
                                    @endcan
                                    <th class="text-left p-3 px-5">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="{{ $user->name }}" class="bg-transparent"> </td>
                                    <td class="p-3 px-5"><input type="text" value="{{ $user->username }}" class="bg-transparent"> </td>
                                    <td class="p-3 px-5"><input type="text" value="{{ $user->email }}" class="bg-transparent"> </td>
                                    @can('is-admin')
                                    <td class="p-3 px-5"><input type="text" value="{{ $user->phone }}" class="bg-transparent"> </td>
                                    @endcan
                                    <td class="p-3 px-5"><input type="text" value="{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}" class="bg-transparent"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    {{ $users->links() }}
                </div>
            </section>
@endsection