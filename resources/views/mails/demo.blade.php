Hola, <i>{{ $demo->receiver }}</i>,
<p>Si has recibido este correo, es porque tu presión arterial o tu temperatura corporal están presentando datos anormales</p>

<p><u>Datos del usuario:</u></p>

<div>
<p><b>Identificacion:</b>&nbsp;{{ $demo->identi }}</p>
<p><b>e-mail:</b>&nbsp;{{ $demo->ema }}</p>
</div>

<p>Si estos datos no corresponden a la información que nos porporcionaste cuanto te registraste, por favor, haz caso omiso a este correo y contáctate al correo electrónico sleony@uqvirtual.edu.co</p>

<p><u>Los valores medidos fueron:</u></p>

<div>
<h3>Presión arterial</h3>
<p><b>Sistólica:</b>&nbsp;{{ $demo->sist }}</p>
<p><b>Diastólica:</b>&nbsp;{{ $demo->diast }}</p>
<br><hr>
<p><b>Temperatura:</b>&nbsp;{{ $demo->temp }}</p>
</div>

Por favor ve rápidamente y con cuidado a un centro de atención de salud.

Gracias,
<br/>
<i>{{ $demo->sender }}</i>
