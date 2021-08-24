function dropDownEventListener(){
    const dropDownItems = document.getElementsByClassName("dropdown-item");

    for(let i = 0; i < dropDownItems.length; i++){
        dropDownItems[i].addEventListener("click",function(){
            const parent = dropDownItems[i].parentElement.parentElement;
            const btn = parent.querySelector("button");
            btn.innerText = dropDownItems[i].innerText;
        })
    }
}

dropDownEventListener();