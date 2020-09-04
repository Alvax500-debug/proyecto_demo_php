//crear abjeto XMLHttpRequest
function creaObjetoAjax () { 
     var obj; //variable que recogerá el objeto
     if (window.XMLHttpRequest) { //código para mayoría de navegadores
        obj=new XMLHttpRequest();
        }
     else { //para IE 5 y IE 6
        obj=new ActiveXObject(Microsoft.XMLHTTP);
        }
     return obj; //devolvemos objeto
     }
//función constructora del objeto:			 
function ObjetoAjax () {
     var nuevoajax=creaObjetoAjax()
     this.objeto=nuevoajax;
     this.pedirTexto=pedirTextoAjax;
		 this.cargaXML=cargarXML;
     this.cargaTexto=cargarTexto;
     }			
//función para el método objeto.pedirTexto(url,id) 		
function pedirTextoAjax(url,id) {
     var nuevoajax=this.objeto;
     var idajax=id;
     nuevoajax.open("GET",url,true);
     nuevoajax.onreadystatechange=function () {  
        if (nuevoajax.readyState==4 && nuevoajax.status==200) {
           var textoAjax=nuevoajax.responseText;
           document.getElementById(idajax).innerHTML=textoAjax;
           }
        }
     nuevoajax.send(); 
     }
/*función del método cargaXML: devuelve el DOM del XML	
como parámetro de la función que le pasamos*/
function cargarXML(url,funcion) {
     var nuevoajax=this.objeto; 
     var funcionXML=funcion 
     nuevoajax.open("GET",url,true);
     nuevoajax.onreadystatechange=function() { 
        if (nuevoajax.readyState==4 && nuevoajax.status==200) {
           var propiedad=nuevoajax.responseXML; 
           funcionXML(propiedad);
           }
        }	
     nuevoajax.send();
     }	
//función del método cargaTexto: 
//devuelve el texto del archivo en el parámetro.
function cargarTexto(url,funcion) {
     var nuevoajax=this.objeto; 
     var funcionTexto=funcion 
     nuevoajax.open("GET",url,true);
     nuevoajax.onreadystatechange=function() { 
        if (nuevoajax.readyState==4 && nuevoajax.status==200) {
           var nuevoTexto=nuevoajax.responseText; 
           funcionTexto(nuevoTexto);
           }
        }	
     nuevoajax.send();
     }	
		 
//Función para enviar datos por POSI y devolver en un id: 
function pedirPorPost(url,id,datos) {
     //variables que utilizamos en la función (locales)
     var nuevoajax=this.objeto; //creamos objeto XMLHttpRequest
     var idajax=id; //lugar de la página para insertar la respuesta
     var datosajax=datos; //datos a enviar por POST
     //Preparar el envio con open()
     nuevoajax.open("POST",url,true);
     //cambiar las cabeceras para el envio por POST
     nuevoajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     nuevoajax.setRequestHeader("Content-length", datosajax.length);
     nuevoajax.setRequestHeader("Connection", "close");
     //evento que activa la respuesta: 
     nuevoajax.onreadystatechange=function () {  
        if (nuevoajax.readyState==4 && nuevoajax.status==200) { //al acabar de cargarse
           var textoAjax=nuevoajax.responseText; //recibir respuesta
           document.getElementById(idajax).innerHTML=textoAjax; //insertarla en la página
           }
        }
     //envio de los datos por send()
     nuevoajax.send(datosajax); 
     } 
//Asociar la función anterior con el método "pedirPost" de ObjetoAjax mediante "prototype";	
ObjetoAjax.prototype.pedirPost=pedirPorPost;	 

//envia datos por post y recoge el resultado en el parámetro de una función:
//devuelve el texto del archivo en el parámetro.
function cargarPost(url,funcion,datos) {
     var nuevoajax=this.objeto; 
     var funcionTexto=funcion 
     var datosajax=datos;
     nuevoajax.open("POST",url,true);
     nuevoajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     nuevoajax.setRequestHeader("Content-length", datosajax.length);
     nuevoajax.setRequestHeader("Connection", "close");
     nuevoajax.onreadystatechange=function() { 
        if (nuevoajax.readyState==4 && nuevoajax.status==200) {
           var nuevoTexto=nuevoajax.responseText; 
           funcionTexto(nuevoTexto);
           }
        }	
     nuevoajax.send(datosajax);
     }
ObjetoAjax.prototype.cargaPost=cargarPost;	