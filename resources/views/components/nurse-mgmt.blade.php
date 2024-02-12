@props(['nurse_mgmtCsv'])

@php
$nurse_mgmt = explode(',', $nurse_mgmtCsv);
@endphp

@foreach ($nurse_mgmt as $nurse_mgmt)
<li class="text-black-50" style="font-size: 11px;text-transform:uppercase;" >{{ $nurse_mgmt }}</li>
@endforeach

