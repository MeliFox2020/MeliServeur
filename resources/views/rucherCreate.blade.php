<!DOCTYPE html>
<html>
<head>
<title>Ajouter rucher</title>
</head>
<body>
<form action = "rucherController@insert" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
<tr>
<td>Nom</td>
<td><input type='text' name='nom' /></td>
<tr>
<td>Longitude</td>
<td><input type='text' name='lon' /></td>
</tr>
<tr>
<td>lat</td>
<td><input type="text" name='lat'/></td>
</tr>
</tr>
<tr>
<td colspan = '2'>
<input type = 'submit' value = "Ajouter Rucher"/>
</td>
</tr>
</table>
</form>
</body>
</html>
