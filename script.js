var Pelis=[];

function dia() {
    document.body.style="background:tan; color:black;"
    var botonnoche= document.getElementById("botonnight");
    botonnoche.classList.remove("segundo");    
    // document.body.style.background = "gray";
    // document.body.style.color = "black";
}
function noche() {
    document.body.style="background:black; color:white;";
    var botonnoche= document.getElementById("botonnight");
    botonnoche.classList.add("segundo");

    }

function ventanaSecundaria() {
    var myWindow = window.open ("./area_privada", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=600,height=600");  
}


function myFunction(){
    var tabla= document.getElementById("myTable");
    var campo= document.getElementById("myInput");
    var dato=campo.value;
    var datatabla='<thead><tr class="header"><th>Imagen</th><th onclick="sortTable(2)"><span id="arrow2"></span>Título</th><th onclick="sortTable(3)"><span id="arrow3"></span>año</th><th onclick="sortTable(4)"><span id="arrow4"></span>director</th></tr></thead><tbody>';
//    alert("Hay "+Pelis.length+" peliculas");
    for (var i=0;i<Pelis.length;i++){
        if ((Pelis[i][0].toLowerCase().indexOf(dato.toLowerCase())>-1)|(Pelis[i][1].toLowerCase().indexOf(dato.toLowerCase())>-1)|(Pelis[i][2].toLowerCase().indexOf(dato.toLowerCase())>-1)){
            datatabla=datatabla+"<tr class='tablaPeliculas'><td><img class='imgPeliculas' src='"+Pelis[i][3]+"'></td><td><strong>"+Pelis[i][0]+"</strong></td><td>"+Pelis[i][1]+"</td><td>"+Pelis[i][2]+"</td><td> <a href='ficha.php?id="+Pelis[i][4]+"'>Ver ficha</a></td></tr>";
        }
    }
    datatabla=datatabla+"</tbody></table>";
    tabla.innerHTML=datatabla;
}


function agregapeli(titulo,agno,directores,imagen,id){
    Pelis.push([titulo,agno,directores,imagen,id]);

}
