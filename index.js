/*
const cargasrBtn = document.querySelector('#botoncin');
cargasrBtn.addEventListener('click',obtenerDatos);


function obtenerDatos(){
	const url = "ejemplo.xml";

	fetch(url)
		.then(
				respuesta =>{
					console.log(respuesta);
					console.log(respuesta.status);
					return respuesta.json();
				}
			)
		.then(datos => {
			console.log(datos)
		} )
}
*/	

const cargaBtn = document.querySelector('#botonX');
cargaBtn.addEventListener('click',obtenerDatos);


const contenidoTabla= document.querySelector('#tablaLista tbody');
const vaciarArchivo = document.querySelector('#vaciar')




function obtenerDatos(){
	const contenidoTabla= document.querySelector('#tablaLista tbody');
	const vaciarArchivo = document.querySelector('#vaciar');
	//console.log('Tabla ->',contenidoTabla);
	const docto = "ejemplo.xml";
	//var headings = document.evaluate('//Emisor', document, null, XPathResult.ANY_TYPE, null );
		//console.log(headings);
	
	fetch(docto)
		.then(respuesta => {
			//console.log(respuesta);
			//console.log(respuesta.status);
			return respuesta.text();

		})
		.then(xmlString =>{
			/*
			const xmlDocument = new DOMParser().parseFromString(xmlString,"text/xml");
			const nodos = xmlDocument.querySelectorAll("Comprobante");
			console.log(nodos[0]);
			//console.log(xmlDocument);
			*/
			let parser = new DOMParser();
			//let xmlDOM = parser.parseFromString(xmlString,"application/xml");
			let xmlDOM = parser.parseFromString(xmlString,"text/xml");
			let comprobante = xmlDOM.querySelectorAll('Comprobante');
			//console.log(comprobante[0].attributes);

			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement.children);

			//EMISOR
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[0].attributes.attributes);
			
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[2].children[0].attributes[2].nodeValue);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[2].children[0].attributes[5].nodeValue);
			let productos = '';

			let fila = document.createElement('tr');
			let columna1 = document.createElement('td');
			columna1.innerHTML =comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[0].attributes[0].textContent +' - '+  comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[0].attributes[1].textContent;
			fila.appendChild(columna1);
			let columna2 = document.createElement('td');
			columna2.innerHTML =comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[1].attributes[0].textContent +' - '+comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[1].attributes[1].textContent;
			fila.appendChild(columna2);

			let columna3 = document.createElement('td');
			
				for (var i = 0; i < comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[2].children.length; i++) {
					productos += parseFloat(comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[2].children[0].attributes[2].nodeValue) +' - '+comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[2].children[i].attributes[5].nodeValue;
				}
			columna3.innerHTML=productos;

			fila.appendChild(columna3);
			let columna4 = document.createElement('td');
			columna4.innerHTML =parseFloat(comprobante[0].attributes['xmlns:cfdi'].ownerElement.children[3].attributes[0].nodeValue);
			fila.appendChild(columna4);
			contenidoTabla.appendChild(fila);
			
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][1].attributes);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][0].nextElementSibling.attributes);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][0].nextElementSibling.attributes[0]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][0].nextElementSibling.attributes[1]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][0].nextElementSibling.attributes[2]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][0].nextElementSibling.attributes[3]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][0].nextElementSibling.attributes[4]);
			//console.log(contenidoTabla);

			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][0].nextElementSibling.attributes['Rfc'].value);
			//console.log(comprobante[0].attributes['xmlns:cfdi']['localName']);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].childNodes);


			//RECEPTOR
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][1].attributes);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][1].attributes[0]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][1].attributes[1]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][1].attributes[2]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][1].attributes[3]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][1].attributes[4]);
			

			//CONCEPTOS
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][2].childNodes);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][2].childNodes[0]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][2].childNodes[1]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][2].childNodes[2]);

			//IMPUESTOS
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][3].attributes);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][3].attributes[0]);

			//COMPLEMENTO
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][4].firstChild.attributes);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][4].firstChild.attributes[0]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][4].firstChild.attributes[1]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][4].firstChild.attributes[2]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][4].firstChild.attributes[3]);
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes'][4].firstChild.attributes[4]);

			//TEXT
			//console.log(comprobante[0].attributes['xmlns:cfdi'].ownerElement['childNodes']);

		})
		.catch( error =>{
			console.log(error);
		})


}


