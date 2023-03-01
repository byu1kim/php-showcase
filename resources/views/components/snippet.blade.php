@props(['data'])

<div><a href="/detail/{{ $data['id'] }}"> {{ $data['title'] }} </a></div>
<div><a href="/detail/{{ $data['id'] }}"> {{ $data->title }} </a></div>
@if ($data->practice)
    <div>{{ $data->practice->title }}</div>
@endif
<div>--</div>
