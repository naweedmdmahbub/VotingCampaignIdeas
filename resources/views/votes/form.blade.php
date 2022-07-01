<div class="card-body">

    {{-- <div class="form-group row">
        <label for="building" class="col-sm-2 col-form-label">Building</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="building" id="building" placeholder="Building"
                   value="@if($room->building){{ $room->building }}@endif">
        </div>
    </div> --}}
    <input name="{{$voter_id}}" type="hidden" value="{{$voter_id}}">

    @foreach ($group->groupIdeaPairs as $key=>$value)
        <div class="card">
            <div class="card-body">
                {{-- @foreach ($explode(',', $order->layer_id) as $layer as $item) --}}
                @foreach (explode(',',$value->ideas) as $idea)
                @php
                    // dd($key, $value, $item);
                @endphp
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="voted[{{$value->id}}]" id="exampleRadios1" value="{{$idea}}" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            {{$idea}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

    @endforeach
</div>
<!-- /.card-body -->


<script>
    $(function() {

    });
</script>