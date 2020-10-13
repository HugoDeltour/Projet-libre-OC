window.onresize= function(e){
  if (screen.width < 1000 ){
    if(window.location.href==="http://projet-libre/index.php?route=administration" ||
    window.location.href==="http://projet-libre/index.php?route=ajoutImage" ||
    window.location.href==="http://projet-libre/index.php?route=commentairesSignales" ||
    window.location.href==="http://projet-libre/index.php?route=modifCarrousel" ||
    window.location.href.indexOf("modifImgCarrousel")>0 ){
      window.location.replace("http://projet-libre/index.php?");

    }
  }
}
