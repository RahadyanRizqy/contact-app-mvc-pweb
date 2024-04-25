<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Login to Contact App</h5>
                    <form action="<?= urlpath('login'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <div class="d-flex justify-content-between">
                        <a href="<?=BASEURL?>">Home</a>
                        <a href="<?=urlpath('register');?>">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
