@if (session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-primary my-1 mx-5">
    <h6 class="header-title text-center">
      {{session('message')}}
    </h6>
  </div>
@endif
