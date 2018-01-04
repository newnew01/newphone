<!-- Sidebar navigation-->
<nav class="sidebar-nav">
    <ul id="sidebarnav">

        <li class="nav-devider"></li>
        <li><a class="waves-effect waves-dark" href="#"><i class="mdi mdi-gauge"></i><span class="">หน้าหลัก </span></a></li>

        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-package"></i><span class="hide-menu">สินค้า</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="/product/new">เพิ่มสินค้า</a></li>
                <li><a href="/product/list">รายการสินค้า</a></li>
                <li><a href="/product-catebrand">หมวดหมู่และยี่ห้อ</a></li>
            </ul>
        </li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-package-variant-closed"></i><span class="hide-menu">สต๊อคสินค้า</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="/stock/in">รับสินค้าเข้าใหม่</a></li>
                <li><a href="/stock/transfer">โอนสินค้า</a></li>
                <li><a href="/stock/list">รายการทำสต๊อค</a></li>
            </ul>
        </li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">การขาย</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="/sale/neworder">ขายใหม่ </a></li>
                <li><a href="/sale/list">รายการขาย</a></li>
                <li><a href="/sale/topup">เติมเงิน</a></li>
                <li><a href="/sale/service">บิลบริการ</a></li>
            </ul>
        </li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-barcode"></i><span class="hide-menu">บาร์โค้ด</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="/barcode/product">บาร์โค้ดสินค้า</a></li>
                <li><a href="/barcode/custom">กำหนดเอง</a></li>
            </ul>
        </li>

        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">ผู้ใช้งาน</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="/user/list">ผู้ใช้งาน</a></li>
                <li><a href="/user/role">กำหนดสิทธิ์</a></li>
            </ul>
        </li>

        <li> <a class="waves-effect waves-dark" href="/logout" aria-expanded="false" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-logout"></i><span class="hide-menu">ออกจากระบบ</span></a>
        </li>

    </ul>
</nav>
<!-- End Sidebar navigation -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>