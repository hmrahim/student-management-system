@php
    $prefix = Request::route()->getPrefix();
    $route= Route::current()->getName();


@endphp


<div class="left-sidebar">
    <!-- left sidebar HEADER -->
    <div class="left-sidebar-header">
        <div class="left-sidebar-title">Navigation</div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <!-- NAVIGATION -->
    <!-- ========================================================= -->
    <div id="left-nav" class="nano">
        <div class="nano-content">
            <nav>
                <ul class="nav nav-left-lines" id="main-nav">
                    <!--HOME-->
                    <li class="active-item"><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>


                    <!--UI ELEMENTENTS-->

                    @if (Auth::user()->user_role=="admin")


                    <li class="has-child-item close-item">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>User Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="ui-elements_panels.html">Panels</a></li>

                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Profile Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="ui-elements_panels.html">Panels</a></li>

                        </ul>
                    </li>
                    @endif



                    <li class="has-child-item close-item {{ $prefix== '/setup' ? 'open-item' : ''}}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Setup Management</span></a>
                        <ul class="nav child-nav level-1  ">
                            <li class="{{ $route=='view_class' ? 'active-item': '' }}"><a href="{{ route('view_class') }}">Student Class</a></li>

                            <li class="{{ $route=='view_year' ? 'active-item': '' }}"><a href="{{ route('view_year') }}">Manage Year</a></li>

                            <li class="{{ $route=='view_group' ? 'active-item': '' }}"><a href="{{ route('view_group') }}">Manage Group</a></li>

                            <li class="{{ $route=='view_shift' ? 'active-item': '' }}"><a href="{{ route('view_shift') }}">Manage Shift</a></li>

                            <li class="{{ $route=='view_fee' ? 'active-item': '' }}"><a href="{{ route('view_fee') }}">Manage Fees</a></li>

                            <li class="{{ $route=='view_fees_amount'  ? 'active-item': '' }}"><a href="{{ route('view_fees_amount') }}">Manage Fees Amount</a></li>

                            <li class="{{ $route=='view_exam_type' ? 'active-item': '' }}"><a href="{{ route('view_exam_type') }}">Manage Exam Types</a></li>

                            <li class="{{ $route=='view_subjects' ? 'active-item': '' }}"><a href="{{ route('view_subjects') }}">Manage Subjects</a></li>

                            <li class="{{ $route=='view_assign_subject' ? 'active-item': '' }}"><a href="{{ route('view_assign_subject') }}">Assign Subject</a></li>

                            <li class="{{ $route=='view_designetion' ? 'active-item': '' }}"><a href="{{ route('view_designetion') }}">Manage Designetin</a></li>

                        </ul>
                    </li>
                    <li class="has-child-item close-item {{ $prefix== '/studentregi' ? 'open-item' : ''}}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Student Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li class="{{ $route=='view_student' ? 'active-item': '' }}"><a href="{{ route('view_student') }}">Manage Student</a></li>
                            <li class="{{ $route=='roll_genarate' ? 'active-item': '' }}"><a href="{{ route('roll_genarate') }}">Roll Genarate</a></li>
                            <li class="{{ $route=='view_registration_fee' ? 'active-item': '' }}"><a href="{{ route('view_registration_fee') }}">Student Registration Fee</a></li>
                            <li class="{{ $route=='view_monthly_fee' ? 'active-item': '' }}"><a href="{{ route('view_monthly_fee') }}">Student Monthly Fee</a></li>
                            <li class="{{ $route=='view_exam_fee' ? 'active-item': '' }}"><a href="{{ route('view_exam_fee') }}">Exam Fee</a></li>

                        </ul>
                    </li>
                    <li class="has-child-item close-item {{ $prefix== '/employeregi' ? 'open-item' : ''}}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Employe Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li class="{{ $route=='view_employe' ? 'active-item': '' }}"><a href="{{ route('view_employe') }}">Manage Employe</a></li>
                            <li class="{{ $route=='view_salary' ? 'active-item': '' }}"><a href="{{ route('view_salary') }}">Employ Salary</a></li>
                            <li class="{{ $route=='view_leave' ? 'active-item': '' }}"><a href="{{ route('view_leave') }}">Employ Leave</a></li>
                            <li class="{{ $route=='view_leave' ? 'active-item': '' }}"><a href="{{ route('view_leave') }}">Employ Leave</a></li>

                        </ul>
                    </li>
                    <li class="has-child-item close-item {{ $prefix== '/marks' ? 'open-item' : ''}}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Marks Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li class="{{ $route=='add.marks' ? 'active-item': '' }}"><a href="{{ route('add.marks') }}">Entry Marks</a></li>
                            <li class="{{ $route=='edit.marks' ? 'active-item': '' }}"><a href="{{ route('edit.marks') }}">Edit Marks</a></li>
                            <li class="{{ $route=='view.grade.point' ? 'active-item': '' }}"><a href="{{ route('view.grade.point') }}">Grade Point</a></li>

                        </ul>
                    </li>







                </ul>
            </nav>
        </div>
    </div>
</div>
