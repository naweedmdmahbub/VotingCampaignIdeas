@extends('layouts.app')

@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User List</h3>
            </div>
            <!-- /.card-header -->
            {{-- <div class="card-body">
            </div> --}}
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->

    
    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users  as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->country->name }}</td>
                    <td>{{ $user->state? $user->state->name : $user->country->name }}</td>
                    <td>{{ $user->date_of_birth }}</td>
                    <td>{{ \Carbon::parse($user->date_of_birth)->age  }}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </section>

@endsection