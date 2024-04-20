function activation(idBox,idText){
    if (document.getElementById(idBox).checked == true){
        document.getElementById(idText).disabled = false;
    }
}