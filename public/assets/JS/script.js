//alert('ana JavaScript');

var Back_Top = document.getElementById('Back_Top'),
Body = document.body,
Doc_Element = document.documentElement,
Offset = 100,
Scroll_Position, Doc_Height, Win_Height;
IsFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;

// Calculate the document height
Doc_Height = Math.max(Body.scrollHeight, Body.offsetHeight, Doc_Element.clientHeight, Doc_Element.scrollHeight, Doc_Element.offsetHeight);
if (Doc_Height != 'undefined') {
    Offset = Doc_Height / 4;
}

window.addEventListener("scroll", function (event) {
    Scroll_Position = Body.scrollTop || Doc_Element.scrollTop;
    Back_Top.className = (Scroll_Position > Offset) ? 'visible' : '';
});

Back_Top.addEventListener('click', function (event) {
    event.preventDefault();
    Doc_Element.scrollTop = 0;
    /*
    if (IsFirefox) {
        Doc_Element.scrollTop = 0;
    } else {
        Body.scrollTop = 0;
    }*/
});