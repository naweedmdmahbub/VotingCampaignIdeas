@extends('layouts.app')

@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Group List</h3>
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
                </tr>
            </thead>
            <tbody>
            @foreach($groups  as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </section>

@endsection