<div class="container-fluid bg-secondary my-5">
    <div class="row justify-content-md-center py-5 px-xl-5">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center mb-2 pb-2">
                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Up 2 Date</span></h2>
                <p>Stay updated, stay informed with our latest and upcoming activities.</p>
            </div>
            <form id="up2DateForm">
                <div class="input-group">
                    @csrf
                    <input type="email" name="email" id="email" required class="form-control border-white p-4" placeholder="Email Goes Here">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary px-4">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    $("#up2DateForm").submit(function (e){
        e.preventDefault();
        let _token=$("input[name=_token]").val();
        let email=$("#email").val();
        $.ajax({
            url:"{{route('4Update')}}",
            type:"POST",
            data:{
                _token:_token,
                email:email,
            },
            success:function (){
                $("#up2DateForm")[0].reset();
                alert('successfully sent E-Mail');
            },
            error:function (xhr){
                alert(xhr.responseJSON.errors.email[0]);
                $("#up2DateForm")[0].reset();
            }
        });

    });
</script>
