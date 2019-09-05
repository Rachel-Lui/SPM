<?php
echo "<form action='processlogin.php' method='post'>";
echo "<img src='./logo.png'/>";
echo "<h1>LOGIN</h1>";
//echo "<input type='hidden' name='new' value='qwerty129' />";
echo 
"
<hr></hr>
<p></p>
<table border='0'>
    <tr>
        <td><strong>Email ID:</strong></td>
        <td><input type='text' name='user' size='20'/></td>
    </tr>
    <tr>
        <td><strong>Password:</strong></td>
        <td><input type='password' name='pw' size='20' /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type='submit' name='go' value='submit' /></td>
    </tr>
</table>
";


?>