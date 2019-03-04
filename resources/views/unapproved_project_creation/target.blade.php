


@foreach($target as $a_target)
    <h6><input type="checkbox" name="radios" value="{{$a_target->id}}" /> {{$a_target->	targets}} </h6>

@endforeach