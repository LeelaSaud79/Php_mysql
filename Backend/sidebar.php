<!-- Sidebar -->
<!DOCTYPE html>
<html>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PSW1MY7HB4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-PSW1MY7HB4');
    </script>
</head>

<div class="sidebar" id="mySidebar">
    <div class="side-header">
        <img src="logo.png" width="120" height="120" alt="Collection">
        <h5 style="margin-top:10px;">Hello, Admin</h5>
    </div>

    <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#products" onclick="showProductItems()"><i class="fa fa-th"></i> Products</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>

    <!---->
</div>

<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>
</html>