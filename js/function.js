var myname;
var countMessage = 0;

function myProfile() {
    effectuerRequeteAjax('php/importProfile.php', 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
        if (donnee[0][5] !== "") {
            document.querySelector(".profile img").src = donnee[0][5];
            document.querySelector(".profile label").innerText = donnee[0][3];
        } else {
            document.querySelector(".profile img").src = donnee[0][5];
            document.querySelector(".profile label").innerText = donnee[0][3];
        }

    });
}

function allMyContacts() {
    effectuerRequeteAjax('php/importContact.php', 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
        console.log(donnee)
        
        const listContact = document.querySelector(".list-contact");
        deleteChild(listContact.querySelectorAll("button"));
        for (let index = 0; index < donnee.length - 1; index++) {
            if (donnee[index][3] == null) {
                document.querySelector(".conversation center").style.display = "block";
            }
            const element = donnee[index];
            const button = document.createElement("button");
            const label = document.createElement("label");
            const image = document.createElement("img");
            const span1 = document.createElement("span");
            const span2 = document.createElement("span");
            var name = "";
            button.type = "button";
            button.className = "btn position-relative";
            if (donnee[donnee.length - 1] == element[1]) {
                name = element[4];
            } else {
                if (donnee[donnee.length - 1] == element[2] ){
                    if(element[3] == "null"){
                        name = element[1];
                    }else {
                        name = element[3];
                    }
                }else {
                    name = element[2];
                }
            }
            label.innerText = name;
            effectuerRequeteAjax('php/importImgProfile.php?num', 'GET', null, function (response) {
                // Traitement des données reçues
                var donnees = JSON.parse(response);
                donnees.forEach(elemente => {
                    if(elemente[0] != donnee[donnee.length - 1] && elemente[0] == element[1]) {
                        image.src = elemente[1];
                    }

                    if(element[1] == donnee[donnee.length - 1] && elemente[0] == element[2]) {
                        image.src = elemente[1];
                    }
                });
            })
            button.appendChild(image);
            button.appendChild(label);
            button.id = element[0];
            effectuerRequeteAjax('php/checkNonReadMessage.php?id=' + element[0] , 'GET', null, function (response) {
                // Traitement des données reçues
                span1.innerText = JSON.parse(response);
                if (response == 0) {
                    span1.classList.add ("display-none")
                } else {
                    span1.classList.remove ("display-none");
                    span1.className = "position-absolute top-50 end-0 translate-middle badge rounded-pill text-bg-secondary";
                }
            });
            // span1.innerText = countMessage;
            span2.innerText = "unread messages";
            span2.classList.add("visually-hidden");
            span1.appendChild(span2);
            button.appendChild(span1);
            button.fix = name;
            button.addEventListener("click", (e) => {
                e.preventDefault();
                if(e.target.type == 'button') {
                    identifier = e.target.id;
                    const img = e.target.querySelector("img");
                    document.querySelector(".info-contact img").src = img.src;
                    document.querySelector(".info-contact label").innerText = e.target.fix;
                    markMessageRead(identifier)
                    allMessageWithConact(identifier);
                    if (getScreenSize().width <= 401) {
                        document.querySelector("section").style.display = "flex";
                        document.querySelector(".side-bars").style.display = "none";
                    }
                } else {
                    identifier = e.target.parentElement.id;
                }
            });
            listContact.appendChild(button);
        }
        // if(identifier != 0)
        //     setInterval(reloadMessage, 2);
    });
}

function markMessageRead(params) {
    effectuerRequeteAjax('php/markMessageRead.php?id=' + params, 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
        setMessage(donnee)
    });
}

function allMessageWithConact(params) {
    effectuerRequeteAjax('php/importMessage.php?id=' + params, 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
        setMessage(donnee)
    });
}

function deleteChild(params) {
    for (const div of params) {
        div.parentNode.removeChild(div);
    }
}

function setMessage(donnee) {
    const conversation = document.querySelector(".conversation");
    deleteChild(conversation.querySelectorAll("div"));
    for (let index = 0; index < donnee.length - 1; index++) {
        const element = donnee[index];
        const div1 = document.createElement("div");
        const message = document.createElement("div");
        const label = document.createElement("label");
        const hour = document.createElement("span");
        message.className = "message";
        label.innerText = element[2];
        hour.innerText = element[3];
        message.appendChild(label);
        message.appendChild(hour);
        if (element[5] === donnee[donnee.length - 1]) {
            div1.classList.add("emmet");
        } else {
            div1.classList.add("dest");
        }
        div1.appendChild(message);
        conversation.appendChild(div1);
    }
}

function sendMessage(params) {

    effectuerRequeteAjax('php/sendMessage.php?message=' + params[0] + "&id=" + params[1], 'GET', null, function (response) {
        // Traitement des données reçues
        // var donnee = JSON.parse(response);
    });
}

function addContact(params) {
    effectuerRequeteAjax('php/addContact.php?name=' + params[0] + "&contact=" + params[1], 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
    });
     window.location.reload();
}

function getScreenSize() {
    return {
        width: window.innerWidth,
        height: window.innerHeight
    };
}

function updateNameUser(params) {
    effectuerRequeteAjax('php/function.php?action=updateNameContact&id=' + params[0] + "&nom=" + params[1], 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
    });
}