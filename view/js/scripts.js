

document.getElementById('btnSubmit').addEventListener('click',()=>{
    const mail = document.getElementById('mail').value
    const passwd = document.getElementById('passwd').value
    const address = document.getElementById('address').value

    const xhr = new XMLHttpRequest();
    xhr.open('post',`proccess.php`,true)
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){
            alert( xhr.responseText );
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `mail=${mail}&passwd=${passwd}&address=${address}`
    xhr.send( data )
})

document.getElementById('inputState').addEventListener('change',()=>{
    const code = document.getElementById('inputState').value

    const xhr = new XMLHttpRequest();
    xhr.open('get',`loadData.php?option=2&code=${code}`,true)
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState === 4 && xhr.status === 200 ){
            document.getElementById('inputCity').length = 0
            const towns = JSON.parse( xhr.responseText )
            towns.forEach( town =>  document.getElementById('inputCity').add(new Option(town.name,town.code)))
        }

    }
    xhr.send(null)
})

function begin(){
    const xhr = new XMLHttpRequest();
    xhr.open('get','loadData.php?option=1',true)
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState === 4 && xhr.status === 200 ){
            const data = JSON.parse( xhr.responseText)
            data.forEach( dpto => document.getElementById('inputState').add(new Option(dpto.name,dpto.code)))
        }

    }
    xhr.send(null)
}

begin()