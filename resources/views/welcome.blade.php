<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>SERVER SIDE</h1>
				<table id="example" class="display" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>CI</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Sexo</th>
							<th>Grado Instruccion</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>CI</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Sexo</th>
							<th>Grado Instruccion</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var dataTables = $('#example').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax":{
					url: "{{ url('/api/victor') }}",
					type: "post"
				},
				"columns": [
					{ "data": "id" },
					{ "data": "ci" },
					{ "data": "nombre" },
					{ "data": "apellido" },
					{ "data": "sexo" },
					{ "data": "grado_instruccion" }
				]	 
			});
		});
	</script>
</body>
</html>
