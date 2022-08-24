var alergiasSi = document.getElementById("inlineRadio1"), alergiasNo = document.getElementById("inlineRadio2"), ComidaSi = document.getElementById("inlineRadio4"),
comidaNo = document.getElementById("inlineRadio5"),  especifique1 = document.getElementById("especifique"), especifique2 = document.getElementById("especifique2") ;


alergiasSi.addEventListener('click', (e)=> {
    especifique1.classList.add('true');
})

alergiasNo.addEventListener('click', (e)=> {
    especifique1.classList.remove('true');
})

ComidaSi.addEventListener('click', (e)=> {
    especifique2.classList.add('true');
})

comidaNo.addEventListener('click', (e)=> {
    especifique2.classList.remove('true');
})