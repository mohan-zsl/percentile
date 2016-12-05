<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Framework - Percentil Rank List</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            .title {
                font-size: 30px;
				text-decoration:underline;
				margin-bottom:20px;
            }
        </style>
    </head>
    <body>
		<div class="title"><center>Laravel Framework - Percentil Rank List</center></div>
		<table cellspacing='3' cellpadding='3' border='1' align='center'>
			<tr>
				<th>ID</th><th>Name</th><th>GPA</th><th>Percentil Rank</th>
			</tr>
			@foreach($data as $key => $value)
			<tr>
				<td align="center">{{$value['id']}}</td>
				<td align="center">{{$value['name']}}</td>
				<td align="center">{{$value['gpa']}}</td>
				<td align="center">{{$value['rank']}}</td>
			</tr>
			@endforeach
		</table>
    </body>
</html>