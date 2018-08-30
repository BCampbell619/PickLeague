/*jslint browser: true, devel: true */
function Form(usrName, usrPWord, usrFirst, usrLast, usrMail, usrIdentity, usrSecret, usrDbl) {
    'use strict';
    this.uSign = document.getElementById(usrName);
    this.pSign = document.getElementById(usrPWord);
    this.fName = document.getElementById(usrFirst);
    this.lName = document.getElementById(usrLast);
    this.mail  = document.getElementById(usrMail);
    this.user  = document.getElementById(usrIdentity);
    this.pass1 = document.getElementById(usrSecret);
    this.pass2 = document.getElementById(usrDbl);
    this.focusStyleVal = ['#eee', 'solid 1px #444', '#333'];
    this.fcOutStyleVal = ['rgba(255, 255, 255, 0.5)', 'solid 1px #000', '#333'];
    this.badStyleVal = ['rgba(173, 6, 6, 0.3)', 'solid 1px #AD0606', '#FFF'];
    this.goodStyleVal = ['rgba(0, 214, 0, 0.3)', 'solid 1px #00D600', '#333'];
}

Form.prototype.eventHandler = function (event, id) {
    'use strict';
    if (event === "focus") {
        switch (id) {
        case 'username':
            this.uSign.style.background = this.focusStyleVal[0];
            this.uSign.style.borderBottom = this.focusStyleVal[1];
            this.uSign.style.color = this.focusStyleVal[2];
            break;
        case 'password':
            this.pSign.style.background = this.focusStyleVal[0];
            this.pSign.style.borderBottom = this.focusStyleVal[1];
            this.pSign.style.color = this.focusStyleVal[2];
            break;
        case 'First':
            this.fName.style.background = this.focusStyleVal[0];
            this.fName.style.borderBottom = this.focusStyleVal[1];
            this.fName.style.color = this.focusStyleVal[2];
            break;
        case 'Last':
            this.lName.style.background = this.focusStyleVal[0];
            this.lName.style.borderBottom = this.focusStyleVal[1];
            this.lName.style.color = this.focusStyleVal[2];
            break;
        case 'mail':
            this.mail.style.background = this.focusStyleVal[0];
            this.mail.style.borderBottom = this.focusStyleVal[1];
            this.mail.style.color = this.focusStyleVal[2];
            break;
        case 'identity':
            this.user.style.background = this.focusStyleVal[0];
            this.user.style.borderBottom = this.focusStyleVal[1];
            this.user.style.color = this.focusStyleVal[2];
            break;
        case 'secret':
            this.pass1.style.background = this.focusStyleVal[0];
            this.pass1.style.borderBottom = this.focusStyleVal[1];
            this.pass1.style.color = this.focusStyleVal[2];
            break;
        case 'dblSecret':
            this.pass2.style.background = this.focusStyleVal[0];
            this.pass2.style.borderBottom = this.focusStyleVal[1];
            this.pass2.style.color = this.focusStyleVal[2];
            break;
        default:
            break;
        }
        
    } else if (event === "blur") {
        switch (id) {
        case 'username':
            if (this.uSign.value === "") {
                this.uSign.style.background = this.badStyleVal[0];
                this.uSign.style.borderBottom = this.badStyleVal[1];
                this.uSign.style.color = this.badStyleVal[2];
            } else if (this.uSign.value !== "") {
                this.uSign.style.background = this.fcOutStyleVal[0];
                this.uSign.style.borderBottom = this.fcOutStyleVal[1];
                this.uSign.style.color = this.fcOutStyleVal[2];
            }
            break;
        case 'password':
            if (this.pSign.value === "") {
                this.pSign.style.background = this.badStyleVal[0];
                this.pSign.style.borderBottom = this.badStyleVal[1];
                this.pSign.style.color = this.badStyleVal[2];
            } else if (this.pSign.value !== "") {
                this.pSign.style.background = this.fcOutStyleVal[0];
                this.pSign.style.borderBottom = this.fcOutStyleVal[1];
                this.pSign.style.color = this.fcOutStyleVal[2];
            }
            break;
        case 'First':
            if (this.fName.value === "") {
                this.fName.style.background = this.badStyleVal[0];
                this.fName.style.borderBottom = this.badStyleVal[1];
                this.fName.style.color = this.badStyleVal[2];
            } else if (this.fName.value !== "") {
                this.fName.style.background = this.fcOutStyleVal[0];
                this.fName.style.borderBottom = this.fcOutStyleVal[1];
                this.fName.style.color = this.fcOutStyleVal[2];
            }
            break;
        case 'Last':
            if (this.lName.value === "") {
                this.lName.style.background = this.badStyleVal[0];
                this.lName.style.borderBottom = this.badStyleVal[1];
                this.lName.style.color = this.badStyleVal[2];
            } else if (this.lName.value !== "") {
                this.lName.style.background = this.fcOutStyleVal[0];
                this.lName.style.borderBottom = this.fcOutStyleVal[1];
                this.lName.style.color = this.fcOutStyleVal[2];
            }
            break;
        case 'mail':
            if (this.mail.value === "") {
                this.mail.style.background = this.badStyleVal[0];
                this.mail.style.borderBottom = this.badStyleVal[1];
                this.mail.style.color = this.badStyleVal[2];
            } else if (this.mail.value !== "") {
                this.mail.style.background = this.fcOutStyleVal[0];
                this.mail.style.borderBottom = this.fcOutStyleVal[1];
                this.mail.style.color = this.fcOutStyleVal[2];
            }
            break;
        case 'identity':
            if (this.user.value === "") {
                this.user.style.background = this.badStyleVal[0];
                this.user.style.borderBottom = this.badStyleVal[1];
                this.user.style.color = this.badStyleVal[2];
            } else if (this.user.value !== "") {
                this.user.style.background = this.fcOutStyleVal[0];
                this.user.style.borderBottom = this.fcOutStyleVal[1];
                this.user.style.color = this.fcOutStyleVal[2];
            }
            break;
        case 'secret':
            if (this.pass1.value === "") {
                this.pass1.style.background = this.badStyleVal[0];
                this.pass1.style.borderBottom = this.badStyleVal[1];
                this.pass1.style.color = this.badStyleVal[2];
            } else if (this.pass1.value !== "") {
                this.pass1.style.background = this.fcOutStyleVal[0];
                this.pass1.style.borderBottom = this.fcOutStyleVal[1];
                this.pass1.style.color = this.fcOutStyleVal[2];
            }
            break;
        case 'dblSecret':
            if (this.pass2.value === "") {
                this.pass2.style.background = this.badStyleVal[0];
                this.pass2.style.borderBottom = this.badStyleVal[1];
                this.pass2.style.color = this.badStyleVal[2];
            } else if (this.pass2.value !== "") {
                this.pass2.style.background = this.fcOutStyleVal[0];
                this.pass2.style.borderBottom = this.fcOutStyleVal[1];
                this.pass2.style.color = this.fcOutStyleVal[2];
            }
            break;
        default:
            break;
        }
    }
    
};

Form.prototype.formValidate = function (id_1, id_2) {
    'use strict';
    if (id_1 === "secret" && id_2 === "dblSecret") {
        
        if (this.pass1.value === "") {
            this.pass2.style.background = this.badStyleVal[0];
            this.pass2.style.borderBottom = this.badStyleVal[1];
            this.pass2.style.color = this.badStyleVal[2];
        } else if (this.pass1.value === this.pass2.value) {
            this.pass2.style.background = this.goodStyleVal[0];
            this.pass2.style.bottomBorder = this.goodStyleVal[1];
            this.pass2.style.color = this.goodStyleVal[2];
        } else {
            this.pass2.style.background = this.badStyleVal[0];
            this.pass2.style.borderBottom = this.badStyleVal[1];
            this.pass2.style.color = this.badStyleVal[2];
        }
    }
};

var signIn = new Form('username', 'password'), signUp = new Form('', '', 'First', 'Last', 'mail', 'identity', 'secret', 'dblSecret');

document.querySelector('#dblSecret').addEventListener('keyup', function () {
    'use strict';
    signUp.formValidate('secret', 'dblSecret');
});


document.querySelector('#emailSubmit').addEventListener('submit', function () {
    'use strict';
    var el = document.getElementById('entryError');
    if (el.value === "An email has been sent with your user name.") {
        el.style.color = "#00D600";
        console.log('It has been submitted');
    }
});