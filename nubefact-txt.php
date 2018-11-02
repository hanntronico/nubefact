<?php
/*
// PHP
// No necesitas ninguna librería adicional, solo usa el siguiente código:
// PHP versión 5
// activar en ini.php en desarrollo y producción: extension=php_curl.dll
// activar en  ini.php para ver errores en desarrollo: display_errors = on

 #########################################################
#### INTEGRACIÓN FÁCIL ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# ESTE CÓDIGO FUNCIONA PARA LA VERSIÓN ONLINE Y OFFLINE
# Visita www.nubefact.com/integracion para mas información
+++++++++++++++++++++++++++++++++++++++++++++++++++++++

#########################################################
#### FORMA DE TRABAJO ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# PASO 1: Conseguir una RUTA y un TOKEN para trabajar con NUBEFACT (Regístrate o ingresa a tu cuenta en www.nubefact.com).
# PASO 2: Generar un archivo en formato .JSON o .TXT con una estructura que se detalla en este documento.
# PASO 3: Enviar el archivo generado a nuestra WEB SERVICE ONLINE u OFFLINE según corresponda usando la RUTA y el TOKEN.
# PASO 4: Generamos el archivo XML y PDF (Según especificaciones de la SUNAT) y te devolveremos INSTANTÁNEAMENTE los datos del documento generado.
# Para ver el documento generado ingresa a www.nubefact.com/login con tus datos de acceso, y luego a la opción "Ver Facturas, Boletas y Notas"
# IMPORTANTE: Enviaremos el XML generado a la SUNAT y lo almacenaremos junto con el PDF, XML y CDR en la NUBE para que tu cliente pueda consultarlo en cualquier momento, si así lo desea.
+++++++++++++++++++++++++++++++++++++++++++++++++++++++


#########################################################
#### PASO 1: CONSEGUIR LA RUTA Y TOKEN ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# CUENTA DEMO PARA HACER PRUEBAS
# Puedes usar la siguiente cuenta para hacer pruebas:
#  - LINK: https://demo.nubefact.com/login
#  - USUARIO: demo@nubefact.com
#  - PASSWORD: demo@nubefact.com
# Una vez que ingreses a esta cuenta ve a la opción API (Integración) para ver la RUTA y el TOKEN los cuales son:
#  - RUTA: https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0
#  - TOKEN: d0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677
# También puedes crear una cuenta propia para hacer pruebas más precisas.
#
# CREAR UNA CUENTA PROPIA
#  - Regístrate gratis en www.nubefact.com/register
#  - Ir la opción API (Integración).
# IMPORTANTE: Para que la opción API (Integración) de tu cuenta propia esté activada necesitas escribirnos a soporte@nubefact.com o llámanos al teléfono: 01 468 3535 (opción 2) o celular (WhatsApp) 955 598762.
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 *
 */


/*++++++++++++++++++++++++++++++++++++++ CUENTA UDCH ++++++++++++++++++++++++++++++++++++++++++++++++++*/

// RUTA para enviar documentos
// $ruta = "https://api.nubefact.com/api/v1/e87acdb5-d50f-44bb-924a-cbd40e464450";

//TOKEN para enviar documentos
// $token = "2283a885132b4bf08b631465951e34402dd56af080ca44bdbda4cb8fabe22566";

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


/*++++++++++++++++++++++++++++++++++++++ CUENTA DEMO+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

// RUTA para enviar documentos
// $ruta = "https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0";

   $ruta = "https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0";

// //TOKEN para enviar documentos
// $token = "d0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677";
   $token = "d0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677";

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/




/*
#########################################################
#### PASO 2: GENERAR EL ARCHIVO PARA ENVIAR A NUBEFACT ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# - MANUAL para archivo JSON en el link: https://goo.gl/WHMmSb
# - MANUAL para archivo TXT en el link: https://goo.gl/Lz7hAq
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */

$data_txt = file_get_contents("reporteOK.txt");

/*
#########################################################
#### PASO 3: ENVIAR EL ARCHIVO A NUBEFACT ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# SI ESTÁS TRABAJANDO CON ARCHIVO JSON
# - Debes enviar en el HEADER de tu solicitud la siguiente lo siguiente:
# Authorization = Token token="8d19d8c7c1f6402687720eab85cd57a54f5a7a3fa163476bbcf381ee2b5e0c69"
# Content-Type = application/json
# - Adjuntar en el CUERPO o BODY el archivo JSON o TXT
# SI ESTÁS TRABAJANDO CON ARCHIVO TXT
# - Debes enviar en el HEADER de tu solicitud la siguiente lo siguiente:
# Authorization = Token token="8d19d8c7c1f6402687720eab85cd57a54f5a7a3fa163476bbcf381ee2b5e0c69"
# Content-Type = text/plain
# - Adjuntar en el CUERPO o BODY el archivo JSON o TXT
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt(
	$ch, CURLOPT_HTTPHEADER, array(
	'Authorization: Token token="'.$token.'"',
	'Content-Type: text/plain',
	)
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_txt);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respuesta  = curl_exec($ch);
curl_close($ch);

/*
 #########################################################
#### PASO 4: LEER RESPUESTA DE NUBEFACT ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# Recibirás una respuesta de NUBEFACT inmediatamente lo cual se debe leer, verificando que no haya errores.
# Debes guardar en la base de datos la respuesta que te devolveremos.
# Puedes imprimir el PDF que nosotros generamos como también generar tu propia representación impresa previa coordinación con nosotros.
# La impresión del documento seguirá haciéndose desde tu sistema. Enviaremos el documento por email a tu cliente si así lo indicas en el archivo JSON o TXT.
# Escríbenos a soporte@nubefact.com o llámanos al teléfono: 01 468 3535 (opción 2) o celular (WhatsApp) 955 598762
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */

// AQUI DEBES LEER NUESTRA RESPUESTA

// print_r($respuesta);
// var_dump($respuesta);

echo $respuesta;
echo "<br>";

$subcadena1 = explode("enlace_del_pdf|", $respuesta);
$subcadena2 = explode("enlace_del_xml|", $subcadena1[1]);
$definitivo = explode("|", $subcadena2[0]);
$enlace_pdf = $definitivo[0];

echo "<a href='".$enlace_pdf."' >".$enlace_pdf."</a>"

// $leer_respuesta = json_encode($respuesta, true);
// if (isset($leer_respuesta['errors'])) {
// 	//Mostramos los errores si los hay
//     echo $leer_respuesta['errors'];
// } else {
// 	//Mostramos la respuesta
// $leer_respuesta2 = json_decode($leer_respuesta,true);

// echo $leer_respuesta2['tipo_de_comprobante'];
?>

<!-- <h3>RESPUESTA DE SUNAT</h3>
    <table border="1" style="border-collapse: collapse">
        <tbody>
            <tr><th>tipo:</th><td><?php //echo $leer_respuesta['tipo_de_comprobante']; ?></td></tr>
            <tr><th>serie:</th><td><?php //echo $leer_respuesta['serie']; ?></td></tr>
            <tr><th>numero:</th><td><?php //echo $leer_respuesta['numero']; ?></td></tr>
            <tr><th>enlace:</th><td><?php //echo $leer_respuesta['enlace']; ?></td></tr>
            <tr><th>aceptada_por_sunat:</th><td><?php //echo $leer_respuesta['aceptada_por_sunat']; ?></td></tr>
            <tr><th>sunat_description:</th><td><?php //echo $leer_respuesta['sunat_description']; ?></td></tr>
            <tr><th>sunat_note:</th><td><?php //echo $leer_respuesta['sunat_note']; ?></td></tr>
            <tr><th>sunat_responsecode:</th><td><?php //echo $leer_respuesta['sunat_responsecode']; ?></td></tr>
            <tr><th>sunat_soap_error:</th><td><?php //echo $leer_respuesta['sunat_soap_error']; ?></td></tr>
            <tr><th>pdf_zip_base64:</th><td><?php //echo $leer_respuesta['pdf_zip_base64']; ?></td></tr>
            <tr><th>xml_zip_base64:</th><td><?php //echo $leer_respuesta['xml_zip_base64']; ?></td></tr>
            <tr><th>cdr_zip_base64:</th><td><?php //echo $leer_respuesta['cdr_zip_base64']; ?></td></tr>
            <tr><th>cadena_para_codigo_qr:</th><td><?php //echo $leer_respuesta['cadena_para_codigo_qr']; ?></td></tr>
            <tr><th>codigo_hash:</th><td><?php //echo $leer_respuesta['codigo_hash']; ?></td></tr>
            <tr><th>enlace_del_pdf:</th><td><?php //echo $leer_respuesta['enlace_del_pdf']; ?></td></tr>
        </tbody>
    </table> -->


<?php //} ?>
