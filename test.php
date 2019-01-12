<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Display Date and Time in Javascript</title>
        <script type="text/javascript" src="date_time.js"></script>
    </head>
    <body>
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
            <table style="border: 1px;">
            	<tr>
            		<td>Name</td>
            		<td>Age</td>
            		<td colspan="2">Action</td>
            	</tr>
            	<tr>
            		<td>Foysal</td>
            		<td>24</td>
            		<td>Edit</td>
            		<td>Delete</td>
            	</tr>
            </table>
    </body>
</html>