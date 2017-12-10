<!-- User profile -->
<div class="user-profile">
    <!-- User profile image -->
    <div class="profile-img"> <img src="/assets/images/users/profile.png" alt="user" />
        <!-- this is blinking heartbit-->
        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
    </div>
    <!-- User profile text-->
    <div class="profile-text">
        <h5>{{Auth::user()->name}}</h5>
        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>

        <a href="/logout" class="" data-toggle="tooltip" title="ออกจากระบบ" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i></a>

        <div class="dropdown-menu animated flipInY">
            <!-- text-->
            <a href="#" class="dropdown-item"><i class="ti-user"></i> ข้อมูลของฉัน</a>
            <!-- text-->
            <div class="dropdown-divider"></div>
            <!-- text-->
            <a href="#" class="dropdown-item"><i class="ti-settings"></i> ตั้งค่าของฉัน</a>
            <!-- text-->
            <div class="dropdown-divider"></div>
            <!-- text-->
            <a href="/logout" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> ออกจากระบบ</a>
            <!-- text-->
        </div>
    </div>
</div>
<!-- End User profile text-->
