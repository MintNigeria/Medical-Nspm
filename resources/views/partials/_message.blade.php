@if (session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-primary">
    <h6>
      {{session('message')}}
    </h6>
  </div>
@endif
