var identifier = 0;

myProfile();
allMyContacts();

document.querySelectorAll(".list-contact button").forEach(button => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        allMessageWithConact(identifier);
    });
});
function reloadMessage() {
    if (identifier != 0) {
        allMessageWithConact(identifier);
    }
}
document.querySelector(".send").addEventListener("click", (e) => {
    const talk = document.querySelector(".send-message input[type='text']").value;
    document.querySelector(".send-message input[type='text']").value = "";
    sendMessage([talk, identifier]);
})

setInterval(reloadMessage, 100);
setInterval(allMyContacts, 5000);

document.querySelector(".modal .sendMessage").addEventListener("click", (e) => {
    if (document.querySelector(".form-floating input[name='Username']").value == "" || document.querySelector(".form-floating select").value == "" || document.querySelector(".form-floating input[name='tel']").value == "") {
        return;
    }
    if (document.querySelector(".number").type == "text") {
        updateNameUser([identifier, document.querySelector(".form-floating input[name='Username']").value]);
        return
    }
    addContact([document.querySelector(".form-floating input[name='Username']").value, document.querySelector(".form-floating select").value + "" + document.querySelector(".form-floating input[name='tel']").value]);
});

document.querySelector(".info-contact > i").addEventListener("click", (e) => {
    window.location.reload();
})

