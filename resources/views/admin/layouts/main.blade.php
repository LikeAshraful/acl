@include('admin.partials.header')

<body>
    <div id="wrappper">
      @include('admin.partials.nav')
      
      @yield('content')


  </div>
    <!-- /#wrapper -->
  @include('admin.partials.js')
  
  @yield('js')
</body>

</html>
  