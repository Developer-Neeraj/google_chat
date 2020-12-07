console.log("We create google Chat");

// document.getElementById('email').addEventListener('click', iconBG)
// document.querySelector('body').addEventListener('click', removeBG);

// function iconBG() {
//     document.querySelector('#mail').style.backgroundColor = "#FFFFFF";
// }

// function removeBG() {
//     document.querySelector('#mail').style.backgroundColor = "rgb(255, 196, 0)";
// }

[document.querySelector('#password'), document.querySelector('#email')].foreach(item => {
    item.addEventListener('click', function() {
        document.querySelector('#mail').style.backgroundColor = "#FFFFFF";
        
    })
})