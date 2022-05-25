<div id="mydaftar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title txtl"><i class="fa fa-user"></i>  Registration</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{url('/signUp')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo</label>
                        <input type="file" name="image" class="form-control rounded" id="image" placeholder="image">
                    </div>
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="name" class="form-control rounded" id="username" value="{{old('name')}}" placeholder="Username">
                    </div>
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control rounded" id="exampleInputEmail1" value="{{old('email')}}" placeholder="Email">
                    </div>
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control rounded" id="exampleInputPassword1"  placeholder="Password">
                    </div>
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="ConfirmPassword" class="form-control rounded" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    @error('confirmPassord')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info ">Register</button>
                        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- end modal daftar -->
