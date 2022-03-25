function beginDisciplines(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET','../controller/disciplines.Json',true)

    xhr.onreadystatechange = function(){
        const disciplines1 = document.getElementById('select-eventDiscipline')
        const disciplines2 = document.getElementById('select-ge-discipline')

        if( xhr.readyState === 4 ){
            const disciplines = JSON.parse( xhr.responseText)
            disciplines.forEach(element => {
                disciplines1.add(new Option(element.name,element.name))
                disciplines2.add(new Option(element.name,element.name))

            
            });
        }
    }
    xhr.send(null)
}


function beginEvents(){

    const xhr = new XMLHttpRequest();
    xhr.open('GET','../controller/events.Json',true)
    document.getElementById("name-event-results").length=1
    xhr.onreadystatechange = function(){
        if( xhr.readyState === 4 ){
            const events = JSON.parse( xhr.responseText)
            events.forEach(element => {
                if(element.state==true){
                   document.getElementById("name-event-results").add(new Option(element.nameEvent,element.nameEvent))
                }
            });
        }
    }

    xhr.send(null)

}
function beginTeams(){

    const team = document.getElementById('teamChoose')
    team.length=1
    const xhr = new XMLHttpRequest();
    xhr.open('GET','../controller/teams.Json',true)

    xhr.onreadystatechange = function(){
        if( xhr.readyState === 4 ){
            const teams = JSON.parse( xhr.responseText)
            teams.forEach(element => {
                if(element.state==null){
                    team.add(new Option(element.name,element.name))
                }
            });
        }
    }

    xhr.send(null)
}





function disciplineSingle(){
    const discipline = document.getElementById('select-eventDiscipline').value
    const xhr = new XMLHttpRequest();
    document.getElementById('nameTeam-enroll-event').length=1
    xhr.open('GET','../controller/disciplines.Json',true)
    xhr.onreadystatechange = function(){
        if( xhr.readyState === 4 ){
            const desciplines = JSON.parse( xhr.responseText)
            desciplines.forEach(element => {
                if(element.name==discipline){
                   if(element.type=="team"){
                    const xhr1 = new XMLHttpRequest();
                    xhr1.open('GET','../controller/teams.Json',true)
                    xhr1.onreadystatechange = function(){
                        if( xhr1.readyState === 4 ){
                            console.log("Entra aqui")
                            const teams = JSON.parse( xhr1.responseText)
                            teams.filter(element=>element.state==true).forEach(element => {
                                document.getElementById('nameTeam-enroll-event').add(new Option(element.name,element.name))
                            });
                        }
                    }
                    xhr1.send(null)
                   }
                   else{
                    const xhr2 = new XMLHttpRequest();
                    xhr2.open('GET','../controller/affiliates.Json',true)
                    xhr2.onreadystatechange = function(){
                        if( xhr2.readyState === 4 ){
                            console.log("Entra aqui mero")
                            const afiliates = JSON.parse( xhr2.responseText)
                            afiliates.forEach(element => {
                                document.getElementById('nameTeam-enroll-event').add(new Option(element.numDoc,element.numDoc))
                            });
                        }
                    }
                    xhr2.send(null)
                       
                   }
                }
            });
        }
    }
    xhr.send(null)
    
}

beginDisciplines()
beginTeams()
beginEvents();


document.getElementById('btn-add-team-person').addEventListener('click',()=>{
    const discipline = document.getElementById('select-eventDiscipline').value
    const nameEvent = document.getElementById('eventName').value
    const item = document.getElementById('nameTeam-enroll-event').value

    const xhr = new XMLHttpRequest();
    xhr.open('post',`../controller/addTeam-Affiliates-ToEvents.php`,true);
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){
            alert( xhr.responseText );
            JSON.parse(xhr.responseText).forEach(element=>{
                document.getElementById('teamChoose').add(new Option(element.name,element.name))})
            

        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `discipline=${discipline}&nameEvent=${nameEvent}&item=${item}`
    xhr.send( data )
    beginEvents();

})

document.getElementById('select-eventDiscipline').addEventListener('change',()=>{

    const selected= document.getElementById('select-eventDiscipline').value
    document.getElementById('eventName').length=1
    const xhr = new XMLHttpRequest()
    xhr.open('GET','../controller/events.Json',true)

    xhr.onreadystatechange = function(){
        if( xhr.readyState === 4 ){
            JSON.parse( xhr.responseText).filter(element=>element.discipline==selected)
            .forEach(element=>{
                document.getElementById('eventName').add(new Option(element.nameEvent,element.nameEvent))
            })   
            disciplineSingle();
            
        }
    }
    xhr.send(null)

    })

    document.getElementById("name-event-results").addEventListener('change',()=>{
        const selected= document.getElementById('name-event-results').value
        document.getElementById('name-team-results').length=1
        document.getElementById('name-rank-results').length=1

        const xhr = new XMLHttpRequest()
        xhr.open('GET','../controller/events.Json',true)

        xhr.onreadystatechange = function(){
        if( xhr.readyState === 4 ){
            JSON.parse( xhr.responseText).filter(element=>element.nameEvent==selected)
            .forEach(element=>{
                if(element.teams==null){
                    var cont=0;
                    element.affiliates.forEach(aux=>{
                        cont+=1
                        if(aux.rank==null){
                            document.getElementById('name-team-results').add(new Option(aux.numDoc,element.numDoc))
                            document.getElementById('name-rank-results').add(new Option(cont+'',cont+''))
                        }
                    })
                }else{
                    var cont=0;
                    element.teams.forEach(aux=>{
                        cont++
                        if(aux.state==true || aux.rank==0){
                            document.getElementById('name-team-results').add(new Option(aux.name,element.name))
                            document.getElementById('name-rank-results').add(new Option(cont+'',cont+''))
                        }
                       
                        
                    })

                }
               
            })   
            
        }
    }
    xhr.send(null)
    })


document.getElementById('submitbtn1').addEventListener('click',()=>{
    const firstNames = document.getElementById('firstNames').value
    const lastNames = document.getElementById('lastNames').value
    const typeDoc = document.getElementById('typeDoc').value
    const numDoc = document.getElementById('numDoc').value
    const cell = document.getElementById('phone').value
    const department = document.getElementById('department').value
    const town = document.getElementById('town').value
    const birthday =document.getElementById('birthday').value

    const xhr = new XMLHttpRequest();
    xhr.open('post',`../controller/agregateAffiliates.php`,true);
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){

            JSON.parse(xhr.responseText).forEach(element=>{
                document.getElementById('select-eventDiscipline').add(new Option(element.name,element.name))})
            JSON.parse(xhr.responseText).forEach(element=>{
                document.getElementById('select-ge-discipline').add(new Option(element.name,element.name))})
/*             JSON.parse(xhr.responseText).forEach(element=>{
                document.getElementById('name-discipline-results').add(new Option(element.name,element.name))})
 */
            alert( xhr.responseText );
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `firstName=${firstNames}&lastNames=${lastNames}&typeDoc=${typeDoc}&numDoc=${numDoc}&cell=${cell}&department=${department}&town=${town}&birthday=${birthday}`
    xhr.send( data )

    bringAffliliates().forEach(affiliate=>{
        document.getElementById()
    })


})



document.getElementById('btn-register-team').addEventListener('click',(e)=>{
    document.getElementById('teamChoose').length=1
    const teamName = document.getElementById("teamName").value
    const xhr = new XMLHttpRequest();
    xhr.open('post',`../controller/addTeam.php`,true);
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){
            JSON.parse(xhr.responseText).forEach(element=>{
                document.getElementById('teamChoose').add(new Option(element.name,element.name))})
            
            alert( xhr.responseText );
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `name=${teamName}`
    xhr.send( data )
})



document.getElementById('btn-addEvent').addEventListener('click',()=>{
    alert("It works")
    const nameEvent= document.getElementById('eventName-c4').value
    const discipline = document.getElementById('select-ge-discipline').value
    document.getElementById("eventName").length=1
    const xhr = new XMLHttpRequest();

    xhr.open('post',`../controller/addEvent.php`,true);

    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){
            JSON.parse(xhr.responseText).filter(element=>element.state==true)
            .forEach(element=>{
                document.getElementById("eventName").add(new Option(element.nameEvent,element.nameEvent))
            })
            alert( xhr.responseText );
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `nameEvent=${nameEvent}&discipline=${discipline}`
    xhr.send( data )


})

document.getElementById('btn-delete-affiliate').addEventListener('click',()=>{

    const numDoc= document.getElementById('numDoc').value;

    const xhr = new XMLHttpRequest();
    xhr.open('post',`../controller/deleteAffiliates.php`,true);
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){
            alert( xhr.responseText );
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `numDoc=${numDoc}`
    xhr.send( data )
})

document.getElementById('btn-update-affiliate').addEventListener('click',()=>{
    alert("It works")
    const firstNames = document.getElementById('firstNames').value
    const lastNames = document.getElementById('lastNames').value
    const typeDoc = document.getElementById('typeDoc').value
    const numDoc = document.getElementById('numDoc').value
    const cell = document.getElementById('phone').value
    const department = document.getElementById('department').value
    const town = document.getElementById('town').value
    const birthday =document.getElementById('birthday').value

    const xhr = new XMLHttpRequest();
    xhr.open('post',`../controller/updateAffiliates.php`,true);
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){
            alert( xhr.responseText );
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `firstName=${firstNames}&lastNames=${lastNames}&typeDoc=${typeDoc}&numDoc=${numDoc}&cell=${cell}&department=${department}&town=${town}&birthday=${birthday}`
    xhr.send( data )
})

document.getElementById('btn-delete-team').addEventListener('click',()=>{
    document.getElementById('teamChoose').length=1
    const nameTeam= document.getElementById('teamName').value;
    const xhr = new XMLHttpRequest();
    xhr.open('post',`../controller/deleteTeam.php`,true);
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){

            const teams =JSON.parse(xhr.responseText)
            teams.forEach(element=>{
                if(element.state==null){
                    document.getElementById('teamChoose').add(new Option(element.name,element.name))
                }
               
            })

        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `nameTeam=${nameTeam}`
    xhr.send( data )
})

document.getElementById('btn-deleteEvent').addEventListener('click',()=>{
    alert("It works")
    const nameEvent= document.getElementById('eventName-c4').value;
    const xhr = new XMLHttpRequest();
    xhr.open('post',`../controller/deleteEvent.php`,true);
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){
            alert( xhr.responseText );
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `nameEvent=${nameEvent}`
    xhr.send( data )
})

document.getElementById('btn-enroll-affiliate-team').addEventListener('click',()=>{
    alert("it works")

    const numDoc = document.getElementById("idAffiliate").value;
    const teamSelect = document.getElementById("teamChoose").value;
    const xhr = new XMLHttpRequest();
    xhr.open('post',`../controller/addAffiliatetoTeam.php`,true);
    xhr.onreadystatechange = ()=>{
        if( xhr.readyState == 4 && xhr.status == 200 ){
            alert( xhr.responseText );
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const data = `id=${numDoc}&teamchoose=${teamSelect}`
    xhr.send( data )

})

