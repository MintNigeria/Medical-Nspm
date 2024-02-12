@props(['drugs_mgmtCsv'])

@php
$prescribe = explode(',', $drugs_mgmtCsv);
@endphp

@foreach ($prescribe as $prescribe)
<li class="text-black-50" style="font-size: 11px;text-transform:uppercase;" >{{ $prescribe }}</li>
@endforeach

