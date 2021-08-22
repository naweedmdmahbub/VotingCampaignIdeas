@extends('layouts.app')

@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Idea List in: <strong>{{$idea_group->name}}</strong></h3>
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
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Age</th>
                <th>Country</th>
                <th>State</th>
                {{-- <th>Date of Birth</th>
                <th>Age</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach($ideas  as $idea)
            {{-- @php
                dd($idea);
            @endphp --}}
            <tr>
                <td>{{ $idea->id }}</td>
                <td>{{ $idea->title }}</td>
                <td>{{ $idea->username }}</td>
                <td>{{ $idea->age_group}}</td>
                <td>{{ $idea->country }}</td>
                <td>{{ $idea->state ? $idea->state : $idea->country }}</td>
                {{-- <td>{{ $idea->user->date_of_birth }}</td>
                <td>{{ \Carbon::parse($idea->user->date_of_birth)->age  }}</td> --}}
            </tr>
        @endforeach
        </tbody>

        </table>
    </section>

@endsection