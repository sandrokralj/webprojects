var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var y = document.getElementsByClassName("mySlides-title");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
       y[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    if (myIndex > y.length) {myIndex = 1}
    y[myIndex-1].style.display = "block";
    setTimeout(carousel, 7000);
}


