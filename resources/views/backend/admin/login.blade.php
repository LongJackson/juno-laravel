
<!DOCTYPE html>
<html lang="en">
    
<head>
		<base href="{{url('').'/assets/backend/'}}">
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link rel="stylesheet" href="css/uniform.css" />

		<link href="css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" method="post" class="form-vertical" action="">
				 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="fa fa-user"> </i></span><input type="email" name="email" value="{{ old('email')}}" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="fa fa-lock"></i></span><input type="password" name="password" class="form-control" id="signin-password" value="" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                	<label>
                  <div class="checker" id="uniform-undefined"><span class="checked"><input type="checkbox" name="remember" value="checked" style="opacity: 0;"></span></div>
                  Nhớ tài khoản</label>
                </div>
                {{ csrf_field() }}
                <div class="form-actions">
                    
                    <span class="pull-right"><button type="submit"  class="btn btn-success" /> Đăng nhập</button></span>
                </div>

            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
