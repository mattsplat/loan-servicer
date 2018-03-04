<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://simpleicon.com/wp-content/uploads/smile.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>

            </div>
        </div>



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/client/loans"><i class="fa fa-users text-gray"></i> <span>Loans</span></a></li>
            <li class="active"><a href="/client/lenders"><i class="fa fa-money text-green"></i> <span>Lenders</span></a></li>
            <li class="active"><a href="/client/properties"><i class="fa fa-home text-blue"></i> <span>Properties</span></a></li>
            <li class="active"><a href="/client/payments"><i class="fa fa-home text-blue"></i> <span>Payments</span></a></li>
            <li class="active"><a href="/client/insurance"><i class="fa fa-home text-blue"></i> <span>Insurance</span></a></li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
