@props(['nurse_mgmtCsv'])

@php
$nurse_mgmt = explode(',', $nurse_mgmtCsv);
@endphp

@foreach ($nurse_mgmt as $nurse_mgmt)
<div class="alert alert-primary">{{ $nurse_mgmt }}</div>
@endforeach


