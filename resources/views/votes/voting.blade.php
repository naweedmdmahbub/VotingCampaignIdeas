@extends('layouts.app')

@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Voting</h3>
            </div>
            <!-- /.card-header -->
            {{-- <div class="card-body">
            </div> --}}
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->

    
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Voting</h3>
        </div>
        <form class="form-horizontal" action="{{ route('votes.store', ['voter_id'=>$voter_id,'group_id'=>$group_id]) }}" method="POST">
            {{ csrf_field() }}
            {{-- @php
                dd('hi');
            @endphp --}}
            @include('votes.form')

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
</section>

@endsection