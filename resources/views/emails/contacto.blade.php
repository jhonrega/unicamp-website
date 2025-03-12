<h2>Nuevo mensaje de contacto</h2>

<p><strong>Nombre:</strong> {{ $datos['nombre'] }}</p>
<p><strong>Email:</strong> {{ $datos['email'] }}</p>
<p><strong>WhatsApp:</strong> {{ $datos['whatsapp'] }}</p>
<p><strong>Ciudad:</strong> {{ $datos['ciudad'] }}</p>
<p><strong>¿Requiere cotización?:</strong> {{ $datos['cotizacion'] }}</p>
<p><strong>Tamaño/Capacidad:</strong> {{ $datos['tamano'] }}</p>
<p><strong>Cantidad:</strong> {{ $datos['cantidad'] }}</p>
<p><strong>Tipo:</strong> {{ $datos['tipo'] }}</p>
<p><strong>Material:</strong> {{ $datos['material'] }}</p>
<p><strong>Información Adicional:</strong> {{ $datos['informacion_adicional'] ?? 'No especificado' }}</p>
<p><strong>Desea recibir noticias:</strong> {{ $datos['noticias'] ? 'Sí' : 'No' }}</p>

<p>Saludos, <br> Unicamp SAS</p>
