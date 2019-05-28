function trim(str) { 
  str = str.replace( /^\s+/g, "" ); // strip leading 
  str = str.replace( /\s+$/g, "" ); // strip trailing 

  return str; 
} 

// Controlla la sintassi dell'email inserito
function controllomail(mail){
 var espressione = /^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$/;
 if (!espressione.test(mail))
 {
  return false;
 } else {
  return true;
 }
}

//controllo form account
function control_login() {
	
 
 if (trim(document.login.email.value).indexOf("*") == 0) {
  alert('Inserire l\'indirizzo email');
  return false; 
 } else {
  if (!controllomail(document.login.email.value)) {
   alert("Indirizzo email non valido!");
   return false;
  }
 } 
 
 if (trim(document.login.password.value).indexOf("*") == 0) {
  alert('Inserire la password');
  return false; 
 }
}


//controllo form account
function control_reg() {
	
 if (trim(document.reg.username.value) == '') {
  alert('Inserire la username');
  return false; 
 }
 if (trim(document.reg.password.value)==''){
	  alert('Inserire la password');
	  return false; 
 } else {
	 if (trim(document.reg.password_1.value)==''){
		  alert('Inserire la password nel campo di conferma');
		  return false; 
		} else {
		  if (trim(document.reg.password.value) != trim(document.reg.password_1.value)) {
		
		  alert('ATTENZIONE: Password non corrispondenti');
		  return false; 
		}		
	} 
 }
 
  if (trim(document.reg.nome.value) == '') {
  alert('Inserire il nome');
  return false; 
 }
 
 if (trim(document.reg.cognome.value) == '') {
  alert('Inserire il cognome');
  return false; 
 }
 
  if (trim(document.reg.indirizzo.value) == '') {
  alert('Inserire l\'indirizzo');
  return false; 
 }
 
  if (trim(document.reg.cap.value) == '') {
  alert('Inserire il cap');
  return false; 
 }
 
  if (trim(document.reg.citta.value) == '') {
  alert('Inserire la citta');
  return false; 
 }
 
 if (trim(document.reg.email.value) == '') {
  alert('Inserire l\'indirizzo email');
  return false; 
 } else {
  if (!controllomail(document.reg.email.value)) {
   alert("Indirizzo email non valido!");
   return false;
  }
 } 
 
 //alert (document.registra.conferma.text)
for (counter = 0; counter < document.reg.tipo.length; counter++){ 
	if (document.reg.tipo[counter].checked == true){ 
		var tipoCheck = document.reg.tipo[counter].value ;
		break;
	} else {
		tipoCheck ='';
	}
}

if (tipoCheck =='') {
	alert('Scegliere una tipologia di account');
	return false;
}
		document.reg.submit();
}

function control_insProd() {
	
 if (trim(document.insProd.isbn.value) == '') {
  alert('Inserire l\' isbn');
  return false; 
 }
 
 
  if (trim(document.insProd.nome.value) == '') {
  alert('Inserire il nome');
  return false; 
 }
 
 if (trim(document.insProd.proprietario.value) == '') {
  alert('Inserire il proprietario');
  return false; 
 }
 
  if (trim(document.insProd.prezzo.value) == '') {
  alert('Inserire il prezzo');
  return false; 
 }
 
  if (trim(document.insProd.descrizione.value) == '') {
  alert('Inserire la decrizione');
  return false; 
 }
 
  if (trim(document.insProd.categoria.value) == '') {
  alert('Inserire la categoria');
  return false; 
 }
 
   if (trim(document.insProd.immagine.value) == '') {
  alert('Inserire l\'immagine');
  return false; 
 }
 
  if (trim(document.insProd.gradazione.value) == '') {
  alert('Inserire la gradazione');
  return false; 
 }
 
		document.insProd.submit();
}

