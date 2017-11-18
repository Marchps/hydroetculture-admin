function loadImg(){
    para=document.getElementById("logo");
    alert(para.childNodes.length);
    para.firstChild.nodeValue="Des vêtements vraiment";
    para.lastChild.width="100";
    para.lastChild.height="100";
    para.childNodes[1].style.color="green";
}