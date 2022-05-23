<!DOCTYPE html>
<html lang="en">

<x-layout.style />

<body>
<!-- Topbar Start -->
<x-layout.topbar />
<!-- Topbar End -->


<!-- Navbar Start -->
<x-layout.navbar />
<!-- Navbar End -->
<x-layout.loginModel />

<x-layout.registerModel/>
{{$slot}}

<!-- Footer Start -->
<x-layout.footer />
<!-- Footer End -->

@if (session()->has('email'))
    <script>
        alert('your email or password are incorrect please login again');
    </script>
@endif
<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<x-layout.js/>
</body>

</html>
