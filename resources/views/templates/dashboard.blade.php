<!DOCTYPE html>
<html>
@include('templates.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('templates.partials._navbar')
  @include('templates.partials._sidebar')
  <div class="content-wrapper">
    @yield('content')
  </div>
  @include('templates.partials._footer')
  <div class="control-sidebar-bg"></div>
</div>
@include('templates.partials._scripts')
</body>
</html>
