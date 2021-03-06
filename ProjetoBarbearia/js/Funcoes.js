function mascaraCPF(i){   
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       i.value = v.substring(0, v.length-1);
       return;
    }   
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";
 }
 
 function mascaraRG(i){   
    var v = i.value;      
    i.setAttribute("maxlength", "12"); //12.345.678-9
    if (v.length == 2 || v.length == 6) i.value += ".";   
    if (v.length == 10) i.value += "-";
 }
 
 function mascaraCEP(i){   
    var v = i.value;   
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       i.value = v.substring(0, v.length-1);
       return;
    }     
    i.setAttribute("maxlength", "9"); //15990-030   
    if (v.length == 5) i.value += "-";
 }
 
 function mascaraCel(i){
    var v = i.value;
    // if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
    //    i.value = v.substring(0, v.length-1);
    //    return;
    // }   
    // i.setAttribute("maxlength", "10"); // +55 (16) 98821-7730
    // if (v.length == 5) i.value += "-";
    
    if (v.length == 1) i.value = '+55 (' + v;
    if (v.length == 7 ) i.value = v + ') ';
    if (v.length == 14) i.value += "-"
    return;
 }

 function mascaraDDD(i){
    var v = i.value;
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       i.value = v.substring(0, v.length-1);
       return;
    }   
 }

 function telefone(i){
    var v = i.value;    
    var aux = v;
    if (length == 1)
        i.value = '(' + aux;
    if (length == 3)
        i.value = aux + ')';
    return;
 }
 
 function BlockKeybord(){
             if(window.event){ // IE
                 if((event.keyCode < 48) || (event.keyCode > 57)){
                     event.returnValue = false;
                 }
             }
             elseif(e.which) // Netscape/Firefox/Opera
             {
                 if((event.which < 48) || (event.which > 57))
                 {
                     event.returnValue = false;
                 }
             }
        } 
 
         function troca(str,strsai,strentra){
             while(str.indexOf(strsai)>-1){
                 str = str.replace(strsai,strentra);
             }
             return str;
         }
 
         function FormataMoeda(campo,tammax,teclapres,caracter)
         {
             if(teclapres == null || teclapres == "undefined"){
                 var tecla = -1;
             }
             else{
                 var tecla = teclapres.keyCode;
             }
             if(caracter == null || caracter == "undefined"){
                 caracter = ".";
             }
             vr = campo.value;
             if(caracter != ""){
                 vr = troca(vr,caracter,"");
             }
             vr = troca(vr,"/","");
             vr = troca(vr,",","");
             vr = troca(vr,".","");
 
             tam = vr.length;
             if(tecla > 0){
                 if(tam < tammax && tecla != 8) {
                     tam = vr.length + 1;
                 }
                 if(tecla == 8){
                     tam = tam - 1;
                 }
             }
             if(tecla == -1 || tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105){
                 if(tam <= 2){
                     campo.value = vr;
                 }
                 if((tam > 2) && (tam <= 5)){
                     campo.value = vr.substr(0, tam - 2) + ',' + vr.substr(tam - 2, tam);
                 }
                 if((tam >= 6) && (tam <= 8)){
                     campo.value = vr.substr(0, tam - 5) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
                 }
                 if((tam >= 9) && (tam <= 11)){
                     campo.value = vr.substr(0, tam - 8) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
                 }
                 if((tam >= 12) && (tam <= 14)){
                     campo.value = vr.substr(0, tam - 11) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
                 }
                 if((tam >= 15) && (tam <= 17)){
                     campo.value = vr.substr(0, tam - 14) + caracter + vr.substr(tam - 14, 3) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
                 }
             }
         }
 
         function maskKeyPress(objEvent){        
             var iKeyCode;
             if(window.event){ // IE 
                 iKeyCode = objEvent.keyCode;
                 if(iKeyCode>=48 && iKeyCode<=57) return true;
                    return false;
             }
             else if(e.which){ // Netscape/Firefox/Opera            
                 iKeyCode = objEvent.which;
                 if(iKeyCode>=48 && iKeyCode<=57) return true;
                 return false;
             }
         }
 
// function displayMessage() {
//  var html = document.querySelector('html');

//  var panel = document.createElement('div');
//  panel.setAttribute('class', 'msgBox');
//  html.appendChild(panel);
 
//  var msg = document.createElement('p');
//  msg.textContent = 'This is a message box';
//  panel.appendChild(msg);

//  var closeBtn = document.createElement('button');
//  closeBtn.textContent = 'x';
//  panel.appendChild(closeBtn);

//  closeBtn.onclick = function() {
//    panel.parentNode.removeChild(panel);
//  }
// }