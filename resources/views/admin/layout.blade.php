<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../../css/admin.css">
  <style>
      table.table form
      {
        display: inline-block;
      }
      button.delete
      {
        background: transparent;
        border: none;
        color: #337ab7;
        padding: 0px;
      }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Home</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Адмінка</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li>
            <a href="{{route('orders.index')}}">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{$newOrdersCount}}</span>
            </a>
            
          </li>
          <li>
            <a href="#">Profile</a>
          </li>
          <li>
            <a href="{{route('logout')}}">Logout</a>
          </li>
          
         
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../../img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
     @include('admin._sidebar')
    </section>
    <!-- /.sidebar -->
  </aside>
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
      @if(session('status'))
                    <div class="alert alert-info">
                      <button class="pull-right delete"><span class="hidee">x</span></button>
                        {{session('status')}}
                    </div>
                @endif
    @yield('content')

    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2018</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <
</div>
<script src="../../../js/admin.js"></script>
<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckfinder/ckfinder.js"></script>
<script src="../../../js/jquery.maskedinput.js"></script>
<script>
//Код jQuery, установливающий маску для ввода телефона элементу input
//1. После загрузки страницы,  когда все элементы будут доступны выполнить...
$(function(){
  //2. Получить элемент, к которому необходимо добавить маску
  $("#tel").mask("389999999999");
});
</script>
<script>
    $(document).ready(function(){
      $('.hidee').on('click',function(event){
         var ttt = event.target;
     var div = event.target.parentElement;
     // var href = $(div).attr('href');
     var panel = div.parentElement;
       var container = panel.parentElement;
          container.removeChild(panel);
          
     });
      
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
    })

</script>\

</html>

