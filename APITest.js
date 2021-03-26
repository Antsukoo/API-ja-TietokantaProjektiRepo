//Variables for the basic API information

var server = 'api.worldoftanks.eu';
var search = 'encyclopedia';
var type = 'vehicles';





window.onload = function(){
        
        
        //A gate to prevent an error when loading the first page
        if (document.getElementById('nationI') != null){
        
                
                //Getting the information of the user's selected search filters from the APITest.php file and placing them into variables
                
                var selectedNation = document.getElementById('nationI').value;
                var nation = '&nation=' + selectedNation;
                
                var selectedTier = document.getElementById('tierI').value;
                var tierP = '&tier=' + selectedTier;
                
                var selectedType = document.getElementById('typeI').value;
                var typeP = '&type=' + selectedType;
                
                var parameters = nation + tierP + typeP;
                
                console.log(parameters);
                
                
                
                
                $.getJSON('https://' + server + '/wot/' + search + '/' + type + '/?application_id=22fd6b6ba7f5501f22c52c011ec37ffa' + parameters, function(vehicle){
                  
                  
                  
                  
                  //Getting the length of the user's search results
                  
                  var Ve = Object.keys(vehicle.data).length;
                  
                  for (var i = 0; i < Ve; i++){
                  
                          
                          //Creating the area/image/text for the user's search results
                  
                          var tankDiv = document.createElement('div');
                          var tankImg = document.createElement('img');
                          var tankName = document.createElement('h2');
                          var tankDesc = document.createElement('p');
                          
                          
                          var tankId = Object.keys(req)[i];
                          tankImg.src = vehicle.data[tankId].images.big_icon;
                          
                          tankName.innerHTML = vehicle.data[tankId].name;
                          tankDesc.innerHTML = vehicle.data[tankId].description;
                          
                          tankDiv.appendChild(tankImg);
                          tankDiv.appendChild(tankName);
                          tankDiv.appendChild(tankDesc);
                          
                          
                          
                          document.getElementById('resultDiv').appendChild(tankDiv);
                  
                  }
          
          
         
         
         
          
          
          
                });
        }
        
        
        
        
};




//Function for checking if the users information is valid

function tarkista(){

  var muutt;

  muutt[0] = document.getElementById('etu').value;
  muutt[1] = document.getElementById('suku').value;
  muutt[2] = document.getElementById('kayttaja').value;


  for (var i = 0; i < muutt.length; i++) {
    if (muutt[i] == ''){
      alert("Sinun täytyy täyttää kaikki kentät!");
      return false;
    }
  }

}
