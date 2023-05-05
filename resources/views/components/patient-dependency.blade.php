@props(['dependentCsv'])

@php
$dependencies = explode(',', $dependentCsv);
@endphp

<select name="name" class="form-select text-uppercase" id="">
    <option value=""> Choose ...</option>
    @foreach ($dependencies as $dependency)
    <option value="{{ $dependency }}">{{ $dependency }}</option>
    @endforeach
</select>
