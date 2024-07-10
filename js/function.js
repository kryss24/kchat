var myname;

function myProfile() {
    effectuerRequeteAjax('php/importProfile.php', 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
        document.querySelector(".profile img").src = donnee[0][5];
        document.querySelector(".profile label").innerText = donnee[0][3];
    });
}

function allMyContacts() {
    effectuerRequeteAjax('php/importContact.php', 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
        // document.querySelector(".profile img").src = donnees[0][5];
        // document.querySelector(".profile label").innerText = donnees[0][3];
        const listContact = document.querySelector(".list-contact");
        for (let index = 0; index < donnee.length; index++) {
            const element = donnee[index];
            const button = document.createElement("button");
            const label = document.createElement("label");
            const image = document.createElement("img");
            const span1 = document.createElement("span");
            const span2 = document.createElement("span");
            button.type = "button";
            button.className = "btn position-relative";
            label.innerText = element[4];
            image.src = element[10];
            button.appendChild(image);
            button.appendChild(label);
            button.id = element[0];
            span1.innerText = 99;
            span2.innerText = "unread messages";
            span1.className = "position-absolute top-50 end-0 translate-middle badge rounded-pill text-bg-secondary";
            button.addEventListener("click", (e) => {
                e.preventDefault();
                identifier = e.target.id;
                document.querySelector(".info-contact img").src = element[10];
                document.querySelector(".info-contact label").innerText = element[4];
                allMessageWithConact(e.target.id);
            });

            span2.classList.add("visually-hidden");
            span1.appendChild(span2);
            button.appendChild(span1);
            listContact.appendChild(button);
        }
        // if(identifier != 0)
        //     setInterval(reloadMessage, 2);
    });
}

function allMessageWithConact(params) {
    effectuerRequeteAjax('php/importMessage.php?id='+params, 'GET', null, function (response) {
        // Traitement des données reçues
        var donnee = JSON.parse(response);
        setMessage(donnee)
        // console.log(donnee);
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
    // console.log(params)

    effectuerRequeteAjax('php/sendMessage.php?message=' + params[0] + "&id=" + params[1], 'GET', null, function (response) {
        // Traitement des données reçues
        // var donnee = JSON.parse(response);
        // console.log(response);
    });
}