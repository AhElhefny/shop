<div class="col-lg-7 mb-5">
    <div class="contact-form">
{{--        <div id="success"></div>--}}
{{--        novalidate="novalidate--}}
        <form name="sentMessage" id="ContactForm" >
            @csrf
            <div class="control-group">
                <input type="text" class="form-control" id="name"  placeholder="Your Name"
                        name="name" />
                <p class="help-block text-danger" id="nameError"></p>
            </div>
            <div class="control-group">
                <input type="email" name="email"  class="form-control"  id="email" placeholder="Your Email"
                        />
                <p class="help-block text-danger" id="emailError"></p>
            </div>
            <div class="control-group">
                <input type="text" class="form-control" name="subject"  id="subject" placeholder="Subject"
                         />
                <p class="help-block text-danger" id="subjectError"></p>
            </div>
            <div class="control-group">
                            <textarea class="form-control" rows="6" id="message"   placeholder="Message"

                                      ></textarea>
                <p class="help-block text-danger" id="messageError"></p>
            </div>
            <div>
                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                    Message</button>
            </div>
        </form>
    </div>
</div>
<script>
    $("#ContactForm").submit(function (e){
        e.preventDefault();
        let name=$("#name").val();
        let email=$("#email").val();
        let subject=$("#subject").val();
        let message=$("#message").val();
        $("#nameError").html("");
        $("#emailError").html("");
        $("#subjectError").html("");
        $("#messageError").html("");
        $.ajax({
            url:"{{route('sendContact')}}",
            type:"POST",
            data:{
                _token:"{{csrf_token()}}",
                name:name,
                email:email,
                subject:subject,
                message:message
            },
            success:function (){
                swalFire('success','Your Message sent successfully!');
                $("#ContactForm")[0].reset();
            },
            error:function (xhr,errorMessage){
                if(xhr.responseJSON.errors.name){
                    $("#nameError").html(xhr.responseJSON.errors.name[0]);
                }if(xhr.responseJSON.errors.email){
                    $("#emailError").html(xhr.responseJSON.errors.email[0]);
                }if(xhr.responseJSON.errors.subject){
                    $("#subjectError").html(xhr.responseJSON.errors.subject[0]);
                }if(xhr.responseJSON.errors.message){
                    $("#messageError").html(xhr.responseJSON.errors.message[0]);
                }
            }
        });
    });
    function swalFire(icon,text,title = 'Success'){
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            confirmButtonText: 'Ok'
        })
    }
</script>
