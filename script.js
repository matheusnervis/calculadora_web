function SomenteNumero(e,ehfloat){//filtro que retorna apenas numeros e, caso ehfloat seja verdadeiro, virgula
    var tecla=(window.event)?event.keyCode:e.which;
	
	if((tecla>47 && tecla<58)) return true;
	else{
		if (tecla == 8 || tecla == 0) return true;
		else if (tecla == 44 && ehfloat) return true;
		else  return false;
	}
}