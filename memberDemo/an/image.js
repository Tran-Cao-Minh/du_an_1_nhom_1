function  changeImage(id){
    let imagePath=document.getElementById(id).getAttribute('src');
    document.getElementById('img_main').setAttribute('src',imagePath);

}