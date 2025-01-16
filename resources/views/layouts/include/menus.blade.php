
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="#"> 
                        <h2 class="brand-text"><img src="{{asset('main/img/logo.png')}}" alt=""></h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content"> 
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">  
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Main</span> 
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i data-feather="mail"></i>
                        <span class="menu-title text-truncate" data-i18n="Email">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'income.show' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('income.show') }}">
                        <i data-feather="message-square"></i>
                        <span class="menu-title text-truncate" data-i18n="Chat">Income</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'expense.show' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('expense.show') }}">
                        <i data-feather="check-square"></i>
                        <span class="menu-title text-truncate" data-i18n="Todo">Expense</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'statistic.show' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('statistic.show') }}">
                        <i data-feather="calendar"></i>
                        <span class="menu-title text-truncate" data-i18n="Calendar">Statistics</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'transection.show' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('transection.show') }}">
                        <i data-feather="grid"></i>
                        <span class="menu-title text-truncate" data-i18n="Kanban">Transactions</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'account.show' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('account.show') }}">
                        <i data-feather="save"></i>
                        <span class="menu-title text-truncate" data-i18n="File Manager">Accounts</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'settings.show' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('settings.show') }}">
                        <i data-feather="square"></i>
                        <span class="menu-title text-truncate" data-i18n="Modal Examples">Settings</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->