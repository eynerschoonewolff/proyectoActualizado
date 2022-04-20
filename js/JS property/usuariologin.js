myStorage = window.localStorage
usuarioinfo = []

usuarioinfo  = JSON.parse(myStorage.getItem("Userinfo"))

let tablaRef = document.getElementById("usuariologin")
let newRow = tablaRef.insertRow(0)
let newCell = newRow.insertCell(0)
newCell.textContent =usuarioinfo[0]  
newCell = newRow.insertCell(1)
newCell.textContent = usuarioinfo[1] 
   