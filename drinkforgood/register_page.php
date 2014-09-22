<html>
<head>
<title>ThaiCreate.Com Tutorials</title>
</head>
<body>
<form name="form1" method="post" action="create_user.php">
  Login<br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td > &nbsp;Username</td>
        <td>
          <input name="txtUsername" type="text" id="txtUsername">
        </td>
		<td>
		  <input type="submit" name="checkname" value="check name">
		</td>
      </tr>
	     <tr>
        <td > &nbsp;Email</td>
        <td>
          <input name="txtEmail" type="text" id="txtEmail">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Password</td>
        <td><input name="txtPassword" type="password" id="txtPassword">
        </td>
      </tr>
	   <tr>
        <td> &nbsp;Retype Password</td>
        <td><input name="txtRePass" type="password" id="txtRePass">
        </td>
      </tr>
	   <tr>
        <td> &nbsp;Height</td>
        <td><input name="txtHeight" type="text" id="txtHeight">
        </td>
      </tr>
	   <tr>
        <td> &nbsp;Weight</td>
        <td><input name="txtWeight" type="text" id="txtWeight">
        </td>
      </tr>
	   <tr>
	      <td>
      	  Please select sex.<br></td>
		   <td>
			  <input name="rdoSex" type="radio" value="Man">Man<br>
			  <input name="rdoSex" type="radio" value="Woman">Woman<br>
		  </td>
      </tr>

    </tbody>
  </table>
  <br>
  <input type="submit" name="create" value="create">
  <input type="submit" name="back" value="Back">

</form>

</body>
</html>
