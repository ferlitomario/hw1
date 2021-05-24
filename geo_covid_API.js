fetch("API1.php").then(onResponseGeo).then(onJsonGeo);

function onResponseGeo(response){

  return response.json()


}

function onJsonGeo(json){
  console.log(json);


    const result3 = json.city;
    console.log(result3);
    const posizione = document.querySelector(".posizione");
    posizione.textContent = "CITTA':"+result3;


    const result4 = json.continent;
    console.log(result4);
    const continente = document.querySelector(".continente")
    continente.textContent = "CONTINENTE:"+result4;


    const result5 =json.ip_address;
    console.log(result5);
    const ip = document.querySelector(".ip")
    ip.textContent = "IP:"+result5;






  fetch("API2.php").then(onResponsecovid).then(onjsoncovid);
}

const endpoint= 'https://api.quarantine.country/api/v1/summary/region?region=';

const form = document.querySelector(".DatiC")
form.addEventListener("submit", search)

function search (event){
  event.preventDefault()
  const content = document.querySelector("#CoronaV");
  const  value = content.value
  console.log('letto');

  if(!content){
    alert("Inserisci testo nella casella")
  }
  else{
    const text = encodeURIComponent(value)
    const request = endpoint + value;
    fetch(request).then(onResponsecovid).then(onjsoncovid)
  }
}



function onResponsecovid(response){
  return response.json()


}


function onjsoncovid(json){

    console.log(json);
     const result = json.data.summary.total_cases;
     console.log(result);
     const cases = document.querySelector("h3");
     cases.textContent= "CASI TOTALI:"+result;

     const result2= json.data.summary.deaths;
     console.log(result2);
     const deaths = document.querySelector("h4");
     deaths.textContent = "MORTI TOTALI:"+result2;


}
