@props(['drugs_mgmtCsv'])

@php
$prescription = explode(',', $drugs_mgmtCsv);
@endphp

@foreach ($prescription as $prescription)
<div class="alert alert-primary">{{ $prescription }}</div>
@endforeach


