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
    allMessageWithConact(identifier);
}
document.querySelector(".send").addEventListener("click", (e) => {
    sendMessage([document.querySelector(".send-message input[type='text']").value, identifier]);
})

setInterval(reloadMessage, 100);