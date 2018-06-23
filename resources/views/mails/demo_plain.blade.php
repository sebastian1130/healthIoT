Hola {{ $demo->receiver }},
Esta es la versión en texto plano del mensaje que se debería haber enviado.
Debe existir algún problema con la conexión a internet. Y también con tu presión arterial o temperatura corporal.

Tus datos:

Identificacion: {{ $demo->identi }}
email: {{ $demo->ema }}

Tus medidas fueron:

Sistólica: {{ $demo->sist }}
Diastólica: {{ $demo->diast }}

Temperatura: {{ $demo->temp }}

Por favor asiste a un centro de atención médico lo más pronto posible.

Gracias,
{{ $demo->sender }}
