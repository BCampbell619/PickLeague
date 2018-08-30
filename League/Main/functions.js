function Navigation(navState, id, hideClass, showClass) {
    'use strict';
    this.currState = navState;
    this.actTarget = document.getElementById(id);
    this.hideClass = hideClass;
    this.showClass = showClass;
}

Navigation.prototype.elementCheck = function (theElement, theClass) {
    'use strict';
    this.el = document.getElementById(theElement).innerHTML;
    this.adminChk = this.el.slice(0, 5);
    
    if (this.currState === false) {
        
        if (this.adminChk === "Admin") {
            
            document.querySelector(theClass).style.height = "170px";
            this.currState = true;
            
        } else {
            
            document.querySelector(theClass).style.height = "112px";
            this.currState = true;
        }
    
    } else if (this.currState === true) {
        
        if (this.adminChk === "Admin") {
            
            document.querySelector(theClass).style.height = "0px";
            this.currState = false;
            
        } else {
            
            document.querySelector(theClass).style.height = "0px";
            this.currState = false;
        }
        
    }
    
    
};

var profileNav = new Navigation(false, 'usrProfile', 'drop-content');

document.querySelector('#profile').addEventListener('click', function () {
    'use strict';
    console.log(this.currState);
    profileNav.elementCheck('first', '.drop-content');
});