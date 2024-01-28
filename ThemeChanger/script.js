const c1 = document.getElementById("b1");
const c2 = document.getElementById("b2");
const c3 = document.getElementById("b3");
const c4 = document.getElementById("b4");

c1.addEventListener('click', function() {
    document.body.style.backgroundColor = "black";
    document.querySelectorAll('h1').forEach(function(element) {
        element.style.color = "white";
    });
});

c2.addEventListener('click', function() {
    document.body.style.backgroundColor = "white";
    document.querySelectorAll('h1').forEach(function(element) {
        element.style.color = "black";
    });
});

c3.addEventListener('click', () => {
    document.body.style.fontFamily = "Arial, sans-serif";
});

c4.addEventListener('click', () => {
    document.body.style.fontFamily = "Times New Roman, serif";
});