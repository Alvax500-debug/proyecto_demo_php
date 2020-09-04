

function genera_tabla(){

    var cuerpo_tabla = document.getElementById("tabla_ajax");

    datos="action=mostrar";
    ajax1 = new ObjetoAjax();

    ajax1.recibirJSON("procesar_datos.php",tabla_dinamica,datos);

    function tabla_dinamica(infor){

        for (let index = 0; index < infor.length; index++) {
            //const element = array[index];
            //alert(infor[index].titulo)

            var hilera = document.createElement("tr");

            var linkEditar = document.createElement("a");
            linkEditar.setAttribute("id","edit "+infor[index].id+"");
            linkEditar.setAttribute("href","");
            linkEditar.appendChild(document.createTextNode("Editar"));
            //linkEditar.onclick=actualizar();
            linkEditar.addEventListener("click",function(){
                actualizar(infor[index].id);
            })

            var linkEliminar = document.createElement("a");
            linkEliminar.setAttribute("id","delete "+infor[index].id+"");
            linkEliminar.setAttribute("href","");
            linkEliminar.appendChild(document.createTextNode("Eliminar"));
            //linkEliminar.onclick=actualizar();
            linkEliminar.addEventListener("click",function(){
                borrar(infor[index].id,infor[index].titulo)
            });
            
            var celdaTit = document.createElement("td");
            var titulo = document.createTextNode(infor[index].titulo);
            celdaTit.appendChild(titulo);
            hilera.appendChild(celdaTit);

            var celdaAnio = document.createElement("td");
            var anio = document.createTextNode(infor[index].anio);
            celdaAnio.appendChild(anio);
            hilera.appendChild(celdaAnio);

            var celdaGen = document.createElement("td");
            var genero = document.createTextNode(infor[index].genero);
            celdaGen.appendChild(genero);
            hilera.appendChild(celdaGen);

            var celdaEdit = document.createElement("td");
            //var edit = document.createTextNode("editar");
            celdaEdit.appendChild(linkEditar);
            hilera.appendChild(celdaEdit);

            var celdaElim = document.createElement("td");
            //var elim = document.createTextNode("eliminar");
            celdaElim.appendChild(linkEliminar);
            hilera.appendChild(celdaElim);

            
            cuerpo_tabla.appendChild(hilera);
        }
        /* infor.forEach(element => {
            <tr>
                <td>element.titulo</td>
                <td>element.anio</td>
                <td>element.genero</td>
                <td>editar</td>
                <td>eliminar</td>
            </tr>
            alert(element.titulo)
        }); */
        //alert(infor[0].titulo)
    }
}

function actualizar(id){
    //alert("Aqui se va a editar");
    var ventanaDialogo = document.getElementById("demoDialog");
    var guardar = document.getElementById("actualizar");
    var cancelar = document.getElementById("cancel");
    //let editador = "edit " + infor[index].id;
    //var link_referencia = document.getElementById(editador)
    

    datos="action=unico&id="+id;
    ajax2 = new ObjetoAjax();

    ajax2.recibirJSON("procesar_datos.php",editar_dialogo,datos);

    
    //link_referencia.setAttribute("class", "close");

    //alert("la ventana de dialogo esta oculta? " + );

    function editar_dialogo(dato){
        var lugar_titulo = document.getElementById("titulo2");
        var lugar_anio = document.getElementById("anio2");
        var lugar_genero = document.getElementById("genero2");

        alert(dato)

        /* lugar_titulo.setAttribute("value",""+dato.titulo+"");
        lugar_anio.setAttribute("value",dato[0].anio);
        lugar_genero.setAttribute("value",dato[0].genero); */
    }

    //event.preventDefault();
    //ventanaDialogo.setAttribute("open","open");

    cancelar.addEventListener("click",function(){
        ventanaDialogo.removeAttribute("open");
        //link_referencia.removeAttribute("class", "close");
    })
}

function borrar(id,titulo){
    var respuesta = confirm("¿Seguro que deseas eliminar este elemento "+titulo+"?");
    if(respuesta){
        alert("Buu, te asuste")
    }
    else{

    }
}