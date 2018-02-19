<!DOCTYPE html>
<html>
@include('templates.partials._head')
@include('templates.partials._alert')
    @yield('content')
@include('templates.partials._scripts')
@yield('scripts')
</body>
</html>
