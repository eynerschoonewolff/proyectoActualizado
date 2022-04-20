myStorage = window.localStorage
listarequest = []

const svrequest =()=>{

    let info={
        nombre: document.getElementById("nombreContacto").value,
        email: document.getElementById("emailContacto").value,
        tel: document.getElementById("telefonoContacto").value,
        asunto: document.getElementById("asuntoContacto").value,
        sms: document.getElementById("smsContacto").value,
    }

    if(myStorage.getItem("Solicitudes")){
        listarequest = JSON.parse(myStorage.getItem("Solicitudes"))
    }    

    listarequest.push(info)
    myStorage.removeItem("Solicitudes")
    myStorage.setItem('Solicitudes',JSON.stringify(listarequest))

    let tablaRef = document.getElementById("tablacontenidoContacto")
    let newRow = tablaRef.insertRow(-1)
    let newCell = newRow.insertCell(0)
    newCell.textContent = info.nombre   
    newCell = newRow.insertCell(1)
    newCell.textContent = info.email
    newCell = newRow.insertCell(2)
    newCell.textContent = info.tel
    newCell = newRow.insertCell(3)
    newCell.textContent = info.asunto
    newCell = newRow.insertCell(4)
    newCell.textContent = info.sms    
}