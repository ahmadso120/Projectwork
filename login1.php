
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Akademik</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="shortcut icon" href="theme/menu-top/images/favicon.png" type="image/jpeg" />
<script language="javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/web.js"></script>
</head>

<body>
<div class="all">
<div class="wrapper">
<div class="header">
<h1>Halaman Depan</h1>
<h2>Sistem Informasi Akademik</h2>
</div>

<div class="leftbar">
<div class="leftbar-menu-container">
<div class="menu">


</div>
</div>
</div>
<div class="content-wrapper">
<div class="content content-home">

	<div class="circle">
    	<div class="circle-inner circle-inner-1">
        	<a href="login.php" class="login-link login-umum"><img src="tools/images/trans.gif"></a>
        </div>
    </div>
	<div class="circle">
    	<div class="circle-inner circle-inner-2">
        	<a href="login.php?level=wali" class="login-link login-wali"><img src="tools/images/trans.gif"></a>
        </div>
    </div>
	<div class="circle">
    	<div class="circle-inner circle-inner-3">
        	<a href="login.php?level=guru" class="login-link login-guru"><img src="tools/images/trans.gif"></a>
        </div>
    </div>
	<div class="circle">
    	<div class="circle-inner circle-inner-4">
        	<a href="login.php?level=administrator" class="login-link login-administrator"><img src="tools/images/trans.gif"></a>
        </div>
    </div>
    
    <div class="clear">
    </div>
    
<div class="login">
	<a href="login.php">Log In</a>
</div>
</div>
    
    
</div>
</div>
	<div class="footer">
    <div class="copy">Copyright Sistem Informasi Akademik Sekolah 2014. All rights reserved</div>
    <div class="developer">Developed by <a href="http://www.planetbiru.net">Planet Biru Studio</a></div>
    </div>
</div>

<div class="box">
<div class="box-inner">
    <div class="box-header">
        <span class="box-close"><a href="./" title="Close"><img src="tools/images/trans.gif" alt="Close" /></a></span>
        <h1>Login Pengguna</h1>
    </div>
       <div class="form-login">
         <form name="login-form" method="post" enctype="multipart/form-data" action="login.php">
            <div class="form-label">ID Pengguna</div>
            <div class="form-input">
            <input type="text" name="userlogin_username" id="username" class="input-login" autocomplete="off" required />
            </div>
            <div class="form-label">Password</div>
            <div class="form-input">
            <input type="password" name="userlogin_password" id="password" class="input-login" autocomplete="off" required />
            <input type="hidden" name="ref" value="%2F">
            </div>
            <div class="form-label">Masuk Sebagai</div>
            <div class="form-input">
            <select name="userlogin_level" id="userlogin_level">
            	<option value="siswa">Siswa</option>
            	<option value="wali">Wali Murid</option>
            	<option value="guru">Guru</option>
            	<option value="administrator">Administrator</option>
            </select>
            </div>
            <div class="login-button-area">
            <input type="submit" name="login" id="login" class="button-login" value="Login" /> <a href="reset-password.php">Lupa password</a>
            </div>                
          </form>
       </div>
    </div>
</div>

</body>
</html>
