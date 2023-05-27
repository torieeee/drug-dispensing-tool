function toggleswitcher(elmnt,page){

  let toggle,togglecontent

  togglecontent = document.getElementsByClassName("togglecontent");
  
  for(i=0; i<togglecontent.length; i++){
    togglecontent[i].style.display = "none";
  }




  toggle = document.getElementsByClassName("togglebtn");

  for(i=0; i<toggle.length; i++){
    toggle[i].style.backgroundColor = "";
  }


  elmnt.style.backgroundColor = "white";
  document.getElementById(page).style.display = "flex";

}


function accountSwitcher(accountType){

  let accountSelector;

  accountSelector = document.getElementsByClassName("acctype");

  for(i=0; i<accountSelector.length; i++){
    accountSelector[i].style.display = "none";
  }

  document.getElementById(accountType).style.display = "block";
}


function accountCloser(){

  accountSelector = document.getElementsByClassName("acctype");

  for(i=0; i<accountSelector.length; i++){
    accountSelector[i].style.display = "none";
  }

}

document.getElementById("defaultOpen").click();