

function onResponse (response){
  return response.json();
}




function onJson(json) {
  console.log(json);

    //1 CREAZIONE DIV CONT
    for(let i=0;i<json.length;i++) {
        const div_cont=document.createElement('div');
        div_cont.classList.add('cont');
        div_cont.dataset.ind=json[i].id;//segnalo i blocchi conte
        const struct= document.querySelector('.struttura');
        struct.appendChild(div_cont);
    }



    //2 creazione div head
    for(let i=0;i<json.length;i++) {
        const div_head= document.createElement('div');
        div_head.classList.add('head');

        const conte=document.querySelectorAll('.cont');
        conte[i].appendChild(div_head);
    }

    //3 creazione contenuto dinamico
    for (let i=0;i<json.length;i++) {
        const new_h1= document.createElement('h1');
        new_h1.textContent=json[i].titolo;
        const prefe = document.createElement('img');
        prefe.src = "immagini/favorites.png";
        prefe.classList.add('prefe');
        /*prefe.addEventListener('click',Preferiti);*/

        const inte=document.querySelectorAll('.head');
        inte[i].appendChild(new_h1);
        inte[i].appendChild(prefe);

        const new_img=document.createElement('img');
        new_img.src=json[i].immagine;
        const conte=document.querySelectorAll('.cont');
        conte[i].appendChild(new_img);

        const descr= document.createElement('p');
        descr.textContent= json[i].descrizione;
        descr.classList.add('hidden');
        conte[i].appendChild(descr);

        const testo=document.createElement('h3');
        testo.textContent="Leggi la descrizione";
        conte[i].appendChild(testo);


        const de=document.querySelectorAll('.struttura h3')
        for(descrizione of de){

        	descrizione.addEventListener('click',MostraDescrizione);
        }
    }

}


fetch('http://localhost:8888/HW1/contenuti.php').then(onResponse).then (onJson);



function VisualizzaMeno(){
	event.currentTarget.textContent="Leggi la descrizione!";
	const mostra= event.currentTarget.parentNode.querySelector('p');
	mostra.classList.add('hidden');
	event.currentTarget.addEventListener('click',MostraDescrizione);
	event.currentTarget.removeEventListener('click', VisualizzaMeno);
}


function MostraDescrizione(){
	event.currentTarget.textContent="Mostra di meno!";
	const mostra= event.currentTarget.parentNode.querySelector('p');
	mostra.classList.remove('hidden');
	event.currentTarget.removeEventListener('click',MostraDescrizione);
	event.currentTarget.addEventListener('click', VisualizzaMeno);
}




// implementazione Preferiti


function createStarElement(){
  const sE =document.createElement('div');
  sE.classList.add('prefe');

  const name = document.createElement('div');
  name.classList.add('name');
  name.textContent = element.getElementByclassName('name')[0].textContent;
  sE.appendChild(name);

  const star = document.createElement('img');
  star.classList.add('star');
  star.src = element.getElementByclassName('star')[0].src;
  star.addEventListener('click',rmStarredFromStarredSection);
  sE.appendChild(star);

  const foto = document.createElement('img');
  foto.classList.add('foto');
  foto.src = element.getElementByclassName('foto')[0].src;
  sE.appendChild(foto);

  const p =document.createElement('p');
  p.classList.add('hidden');
  p.textContent = element.getElementBytagName('p')[0].textContent;
  sE.appendChild(p);

  section.appendChild(sE);

}

function addStarred(event){
  const imgStar =event.currentTarget;
  imgStar.src = "immagini/favorites.png";

  const element = imgStar.parentNode;
  const starSection = document.querySelector('prefe')


  if(starSection.innerHTML === ''){

    starSection.parentNode.classList.remove('hidden');

  }

  createStarElement(element, starSection);

  imgStar.addEventListener('click',rmstarredFromSection);
  imgStar.removeEventListener('click',addStarred);
}

function rmstarredFromSection(event) {
  const imgStar = event.currentTarget;
  imgStar.src = "immagini/remove.jpg";

  const starSection = document.querySelector('prefe');

  for (const e of starSection.childNodes){

    if(e.getElementByclassName('name')[0].textContent === imgStar.parentNode.getElementByclassName('name'[0]).textContent){
      starSection.removeChild(e);
      break;
    }
  }




if (starSection.innerHTML === ''){

  starSection.parentNode.classList.add('hidden');

}

imgStar.addEventListener('click',addStarred);
imgStar.removeEventListener('click',rmstarredFromSection);

}

function rmStarredFromStarredSection(event) {
  const imgStar = event.currentTarget;

  const section = document.querySelector("#sez_prefe");
  const starSection = document.querySelector("prefe");


  for (const e of section.childNodes){


    if(e.nodeType ===Node.ELEMENT_NODE && e.getElementByclassName('name')[0].textContent === imgStar.parentNode.getElementByclassName('name')[0].textContent){


      e.getElementByclassName('star')[0].src = "immagini/favorites.jpeg";
      e.getElementsByClassName('star')[0].addEventListener('click',addStarred);
      e.getElementsByClassName('star')[0].removeEventListener('click', rmstarredFromSection);
      break;

        }
  }

  imgStar.parentNode.parentNode.removeChild(imgStar.parentNode);

  if(starSection.innerHTML === ''){
    starSection.parentNode.classList.add("hidden");
  }
}




//AGGIUNGE UN EVENT LISTENER SUI PREFERITI.OK
const pref=document.querySelectorAll('.prefe');
for (preferiti of pref){
preferiti.addEventListener('click',Preferiti);
}


//3- implementazione della barra di ricerca per trovare più velocemente le mete desiderate.


const barra=document.querySelector('header input');

barra.addEventListener('keyup',Barra_di_Ricerca);

//OK FUNZIONA
function Barra_di_Ricerca(event){
		const ricerca=event.currentTarget.value.toLowerCase();
		//console.log(ricerca);
		if (ricerca===''){
			const cont=document.querySelectorAll('.struttura .cont');

			for(contenitore of cont){
				contenitore.classList.remove('nascondi');
			}

		} else{
			const cont=document.querySelectorAll('.struttura .cont');
			console.log(cont);
			for (contenitore of cont) {
				contenitore.classList.add('nascondi');
			}
			console.log("La parola immessa in input è." + ricerca);
			for(let i=0;i<cont.length;i++){
			 const titolo=cont[i].querySelector('h1').textContent.toLowerCase();
			 //console.log(titolo);
			 if(titolo.indexOf(ricerca)!==-1){
					cont[i].classList.remove('nascondi');
			}
		}
	}
}
