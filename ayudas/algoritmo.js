NO PERDER CONTACTO CON LOS CLIENTES POR ESOS PERDEMOS

la cara de confianza 
decirle algo que a ellos le esta pasando 
tener una buena reseña
tener en internet cosas positiva s

segun la pregunta que te haga eso es lo que le interesas

function cambiarColor(clase,r){
	
  $("."+clase).css('background',"rgb("+r+","+r+","+r+")");
}
function derecha(X,x){
	return X<x;
}
$(".floor").mousedown(function (e1) {
		X=e1.pageX;
    $(this).mousemove(function (e2) {
    		x=e2.pageX;
        
        if(derecha(X,x)){
        	r=r+1;
          console.log("derecha:"+r);
        }else{
        	r=r-1
          console.log("izquierda:"+r);
        }
        
        cambiarColor("floor",r);
    });
}).mouseup(function () {
    $(this).unbind('mousemove');
}).mouseout(function () {
    $(this).unbind('mousemove');
});