<!DOCTYPE html>
<html>
<head>
	<title>BOLETA DE PAGO</title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<div class="boleta" style="width: 100%; height: auto;">
		<div>
			<table>
				<tr>
					<td>
						<img src="{{url('logos/mariposa.png')}}" style="width:80px;height:90px"/>
					</td>
					<td style="line-height: 1px; text-align: center; padding-left: 10px;">
						<P style="font-weight: bold;color: #F515CD; line-height: 8px; font-size: 22px">GOBIERNO AUTONÓMO MUNICIPAL DE EL ALTO</P>
						<P style="line-height: 8px; color: #095AE1; font-weight: bold; font-size: 16px">BONO MUNICIPAL PARA PERSONAS CON DISCAPACIDAD</P>
						<P style="line-height: 8px; color: #095AE1; font-weight: bold; font-size: 16px">GRAVE Y MUY GRAVE</P>
					</td>
					<td style="text-align: center; color: #B60000; font-weight: bold;">
						<P>N° <?php  echo str_pad($boleta->id,5,"0",STR_PAD_LEFT);  ?></P>
						<P>N° Planilla {{ $boleta->nro_planilla }}</P>
					</td>
					
				</tr>
				<tr>
					<td colspan="3" style="padding-left: 550px; font-weight: bold;">
						{{ $boleta->created_at }}
					</td>
				</tr>
			</table>

			<table style="width: 100%" border="1">
				<tr>
					<td colspan="2" style="color: #40936B; font-weight: bold; padding: 5px">
						Persona con Discapacidad
					</td>
				</tr>
				<tr style="text-align: center; background-color: #F3F0DD">
					<td>						
						{{ $boleta->apellido.' '.$boleta->nombre }}
					</td>
					<td>
						{{ $boleta->ci }}						
					</td>
				</tr>
				<tr style="background-color: #D5F8FB; text-align: center;">
					<td>APELLIDOS Y NOMBRES</td>
					<td style="width: 250px">CÉDULA DE IDENTIDAD</td>
				</tr>
				<tr>
					<td colspan="2" style="color: #40936B; font-weight: bold; padding: 5px">
						Padre, Madre, Tutor o Tutora
					</td>
				</tr>
				<tr style="text-align: center; background-color: #F3F0DD">
					<td>
						{{ $boleta->apellido_ser.' '.$boleta->nombre_ser }}
						@if ($boleta->nombre_ser == '')
						    NO REGISTRADO
					    @endif					    
				    </td>
					<td>
						@if ($boleta->ci_ser == '')
						    NO REGISTRADO
					    @endif
						{{ $boleta->ci_ser }}						
					</td>
				</tr>
				<tr style="background-color: #D5F8FB; text-align: center;">
					<td>APELLIDOS Y NOMBRES</td>
					<td style="width: 250px">CÉDULA DE IDENTIDAD</td>
				</tr>
			</table>
			<div class="row">
				<div class="col-md-6">
					<table border="1" style="padding-top: 10px; text-align: center; padding-right: 10px; padding-left: 10px;">
						<tr style="background-color: #A3D2F6">
							<td>MES PAGADO</td>
							<td>IMPORTE Bs.</td>
						</tr>
						<tr>
							<td>								
								@if ($boleta->mes == 1)
									ENERO
								@endif
								@if ($boleta->mes == 2)
									FEBRERO
								@endif
								@if ($boleta->mes == 3)
									MARZO
								@endif
								@if ($boleta->mes == 4)
									ABRIL
								@endif
								@if ($boleta->mes == 5)
									MAYO
								@endif
								@if ($boleta->mes == 6)
									JUNIO
								@endif
								@if ($boleta->mes == 7)
									JULIO
								@endif
								@if ($boleta->mes == 8)
									AGOSTO
								@endif
								@if ($boleta->mes == 9)
									SEPTIEMBRE
								@endif
								@if ($boleta->mes == 10)
									OCTUBRE
								@endif
								@if ($boleta->mes == 11)
									NOVIEMBRE
								@endif
								@if ($boleta->mes == 12)
									DICIEMBRE
								@endif
							</td>
							<td>250</td>
						</tr>
						<tr>
							<td style="background-color: #A3D2F6">TOTAL PAGADO</td>
							<td style="background-color: #F5DEAC">
								{{ $boleta->monto }}								
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-6" style="float: right; margin-right: 100px; margin-top: -20px;">
					<h4>FIRMA BENEFICIARIO</h4>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>