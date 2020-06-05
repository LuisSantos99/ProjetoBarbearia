var ListaServico = [];
var posicao = '';

class Servico{
	constructor(servico,valor){
		this.servico = servico;
		this.valor = valor;
	}
}

function AdicionarServico(xServico,xValor,xLista){    
    var servico = new Servico(xServico,xValor);
    ListaServico.push(servico);    
	document.getElementById('itens').value = ListaServico.join("|");
}

function montarTabela (lista) {		          
        var Html = '<thead class="thead-dark" style="padding:2px 10px;"><tr> <th>Serviço</th><th>Valor (R$)</th><th scope="col">Ação</th></tr></thead>';
        for(var linha = 0; linha < lista.length; linha++){
		  Html += '<tbody> <tr>';	
				Html += '<td>' + lista[linha].servico +'</td>';
				Html += '<td>' + lista[linha].valor +'</td>';
                Html += '<td> <img src="../Image/delete.png" id="btRemover" height="20px" rel="'+ linha + '"></td>';
			Html += '</tr> </tbody>';
			}
		Html += '';
	return Html;
}

function limpartabela(){
	ListaServico=[];	
}

function insereArray(ListaServico){
	var htmlIem = '';
	var htmlValor = '';
	for(var linha = 0; linha < ListaServico.length; linha++){						  
		if (linha > 0) {
			htmlIem +=  "|" +  ListaServico[linha].servico ;
			htmlValor += "|" + ListaServico[linha].valor ;	
		}else{
			htmlIem +=  ListaServico[linha].servico ;	
			htmlValor +=  ListaServico[linha].valor ;
		}																							
	}
	htmlIem += '';						
	htmlValor += '';					
	document.getElementById("itens").value = htmlIem;
	document.getElementById("valorx").value = htmlValor;	
}

function excluiServico(lista,pos){
	lista.splice(pos,1);
}

window.onload = function (){
	document.addEventListener('keypress', function(evento) {
				var origem = evento.target || evento.srcElement;
				var tecla = evento.which || evento.keyCode;
					
				switch (origem.id) {
					case 'Facul':
						if(tecla==13){
							document.getElementById('btAdicionar').click();
						}	
						break;							
				}
			});
	
	document.addEventListener('click',function(evento){
			var elemento = evento.target || evento.SrcElement;
				switch(elemento.id){	
					case 'btAdicionar':					
						var xTipoCorte = document.getElementById('TipoCorte').value;
                        var xValor = document.getElementById('valor').value;       
						if (document.getElementById('valorTotal').value != '')
							var valorTotal = parseFloat(document.getElementById('valorTotal').value);									
						//VERIFICAÇÕES DE INSERÇÃO
						if ((xTipoCorte != 'Selecione') && (xValor != '') ){
                            AdicionarServico(xTipoCorte,xValor,ListaServico);		
							document.getElementById('tabelaServico').innerHTML = montarTabela(ListaServico);
							document.getElementById('TipoCorte').value = 'Selecione';
							document.getElementById('valor').value = '';			
							insereArray(ListaServico);
							if (document.getElementById('valorTotal').value == ''){
								document.getElementById('valorTotal').value =  xValor;
							}else{
								document.getElementById('valorTotal').value = parseFloat(valorTotal) + parseFloat(xValor);	
							}							
							document.getElementById('btConfirmar').disabled = false;							
						}
						break;			
					case 'btRemover':						
							posiccao = elemento.getAttribute('rel');
							excluiServico(ListaServico,posiccao);
							document.getElementById('tabelaServico').innerHTML = montarTabela(ListaServico);		
							insereArray(ListaServico);																					
					break;										
			}
	
	})
}		

