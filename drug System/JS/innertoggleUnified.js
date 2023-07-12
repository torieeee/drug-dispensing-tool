//this js file is meant to handle the level 2 toggling of html files

//key terms here 
//innertogglecontent-> all level2 toggle content
//innertogglebutton ->all level2 buttons


function innertoggle(page,elmnt,color){

  let innertogglecontent,innertogglebtns

  innertogglecontent = document.getElementsByClassName('innertogglecontent');

  //function that shifts the pages
  for(i=0; i<innertogglecontent.length; i++){
    innertogglecontent[i].style.display = "none"
  }

  document.getElementById(page).style.display = "flex"

  //function that removes button color

  innertogglebtns = document.getElementsByClassName('innertogglebutton')

  //function that iterates through the btns and removes their base color
  for(i=0; i<innertogglebtns.length; i++){
    innertogglebtns[i].style.backgroundColor = ""
    innertogglebtns[i].style.color = "black"
  }

  //this changes the btn color to set color
  elmnt.style.backgroundColor = color
  elmnt.style.color = "white"

}

document.getElementById('defaultDisplay').click()

