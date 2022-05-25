<!-- Modal login -->
<div id="mylogin" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title txtl"><i class="fa fa-home"></i>  Login User</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="{{url('/login')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-Mail</label>
                        <input type="text" class="form-control rounded" value="{{old('email'),}}" name="email" id="username" placeholder="Username">
                    </div>
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control rounded" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btnrl" >Login</button>
                        <button type="button" class="btn btn-secondary btnrl" data-dismiss="modal">Close</button>
                    </div>
                </form>
                @error('login')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
<!-- End Modal Login -->
