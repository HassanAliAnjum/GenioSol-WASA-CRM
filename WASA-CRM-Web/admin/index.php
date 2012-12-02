<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css"
</head>
<body>
<div class="login">
		<h1>Login Here</h1><hr/>
        <form action="../actions/signin.php" method="post">
        	<table>
            	<tr>
                <td>Contact Number : </td>
                <td><input type="text" id="contact_num" name="contact_num"></td>
                <td></td>
                </tr>
                <tr>
                <td>Password : </td>
                <td><input type="password" id="password" name="password"></td>
                <td></td>
                </tr>
                <tr>
                <td></td>
                <td><input type="submit" value="Log In"/></td>
                <td></td>
                </tr>
        </table>
</div>

</body>
</html>