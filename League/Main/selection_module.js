var DataController = (function () {
    'use strict';
    var applySelection = function (pick, select) {
        
        if (select === '#away-1' || select === '#home-1') {
            
            document.querySelector('#game_1').value = pick;
            
        }
        if (select === '#away-2' || select === '#home-2') {
            
            document.querySelector('#game_2').value = pick;
            
        }
        if (select === '#away-3' || select === '#home-3') {
            
            document.querySelector('#game_3').value = pick;
            
        }
        if (select === '#away-4' || select === '#home-4') {
            
            document.querySelector('#game_4').value = pick;
            
        }
        if (select === '#away-5' || select === '#home-5') {
            
            document.querySelector('#game_5').value = pick;
            
        }
        if (select === '#away-6' || select === '#home-6') {
            
            document.querySelector('#game_6').value = pick;
            
        }
        if (select === '#away-7' || select === '#home-7') {
            
            document.querySelector('#game_7').value = pick;
            
        }
        if (select === '#away-8' || select === '#home-8') {
            
            document.querySelector('#game_8').value = pick;
            
        }
        if (select === '#away-9' || select === '#home-9') {
            
            document.querySelector('#game_9').value = pick;
            
        }
        if (select === '#away-10' || select === '#home-10') {
            
            document.querySelector('#game_10').value = pick;
            
        }
        if (select === '#away-11' || select === '#home-11') {
            
            document.querySelector('#game_11').value = pick;
            
        }
        if (select === '#away-12' || select === '#home-12') {
            
            document.querySelector('#game_12').value = pick;
            
        }
        if (select === '#away-13' || select === '#home-13') {
            
            document.querySelector('#game_13').value = pick;
            
        }
        if (select === '#away-14' || select === '#home-14') {
            
            document.querySelector('#game_14').value = pick;
            
        }
        if (select === '#away-15' || select === '#home-15') {
            
            document.querySelector('#game_15').value = pick;
            
        }
        if (select === '#away-16' || select === '#home-16') {
            
            document.querySelector('#game_16').value = pick;
            
        }
        
    };
    
    return {
        setSelection: function (pick, select) {
            applySelection(pick, select);
        }
    };
})();

var UIController = (function () {
    'use strict';
    var DOMstrings = {
        gameAwayOne: '#away-1',
        gameAwayTwo: '#away-2',
        gameAwayThree: '#away-3',
        gameAwayFour: '#away-4',
        gameAwayFive: '#away-5',
        gameAwaySix: '#away-6',
        gameAwaySeven: '#away-7',
        gameAwayEight: '#away-8',
        gameAwayNine: '#away-9',
        gameAwayTen: '#away-10',
        gameAwayEleven: '#away-11',
        gameAwayTwelve: '#away-12',
        gameAwayThirteen: '#away-13',
        gameAwayFourteen: '#away-14',
        gameAwayFifteen: '#away-15',
        gameAwaySixteen: '#away-16',
        gameHomeOne: '#home-1',
        gameHomeTwo: '#home-2',
        gameHomeThree: '#home-3',
        gameHomeFour: '#home-4',
        gameHomeFive: '#home-5',
        gameHomeSix: '#home-6',
        gameHomeSeven: '#home-7',
        gameHomeEight: '#home-8',
        gameHomeNine: '#home-9',
        gameHomeTen: '#home-10',
        gameHomeEleven: '#home-11',
        gameHomeTwelve: '#home-12',
        gameHomeThirteen: '#home-13',
        gameHomeFourteen: '#home-14',
        gameHomeFifteen: '#home-15',
        gameHomeSixteen: '#home-16',
        selectOne: '#game_1',
        selectTwo: '#game_2',
        selectThree: '#game_3',
        selectFour: '#game_4',
        selectFive: '#game_5',
        selectSix: '#game_6',
        selectSeven: '#game_7',
        selectEight: '#game_8',
        selectNine: '#game_9',
        selectTen: '#game_10',
        selectEleven: '#game_11',
        selectTwelve: '#game_12',
        selectThirteen: '#game_13',
        selectFourteen: '#game_14',
        selectFifteen: '#game_15',
        selectSixteen: '#game_16'
    };
    
    return {
        
        getSelection: function (select) {
            var qry_check = document.querySelector(select), team = null;
            if (qry_check !== null) {
                team = qry_check.textContent;
                return team;
            } else {
                return false;
            }
        },
        
        getDOMstrings: function () {
            return DOMstrings;
        }
    };
    
})();

var Controller = (function (DataCtrl, UICtrl) {
    'use strict';
    
    var ctrlSelect = function (select) {
        var pick, DOM;
        DOM = UICtrl.getDOMstrings();
        pick = UICtrl.getSelection(select);
        DataCtrl.setSelection(pick, select);
    };
    
    var setUpListeners = function () {
        var DOM = UICtrl.getDOMstrings();
        
        if (UICtrl.getSelection(DOM.gameAwayOne)) {
            document.querySelector(DOM.gameAwayOne).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayOne);
                
            });
        }
        
        if (UICtrl.getSelection(DOM.gameAwayTwo)) {
            document.querySelector(DOM.gameAwayTwo).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayTwo);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwayThree)) {
            document.querySelector(DOM.gameAwayThree).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayThree);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwayFour)) {
            document.querySelector(DOM.gameAwayFour).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayFour);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwayFive)) {
            document.querySelector(DOM.gameAwayFive).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayFive);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwaySix)) {
            document.querySelector(DOM.gameAwaySix).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwaySix);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwaySeven)) {
            document.querySelector(DOM.gameAwaySeven).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwaySeven);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwayEight)) {
            document.querySelector(DOM.gameAwayEight).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayEight);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwayNine)) {
            document.querySelector(DOM.gameAwayNine).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayNine);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwayTen)) {
            document.querySelector(DOM.gameAwayTen).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayTen);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameAwayEleven)) {
            document.querySelector(DOM.gameAwayEleven).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameAwayEleven);
                
            });
            
        }
        
        
        if (document.querySelector(DOM.gameAwayTwelve)) {
        
            document.querySelector(DOM.gameAwayTwelve).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameAwayTwelve);
            
        });
        
        }
        
        if (document.querySelector(DOM.gameAwayThirteen)){ 
        
            document.querySelector(DOM.gameAwayThirteen).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameAwayThirteen);
            
        });
        
        }
        
        if (document.querySelector(DOM.gameAwayFourteen)){ 
        
            document.querySelector(DOM.gameAwayFourteen).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameAwayFourteen);
            
        });
        
        }
        
        if (document.querySelector(DOM.gameAwayFifteen)) {
        
            document.querySelector(DOM.gameAwayFifteen).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameAwayFifteen);
            
        });
        
        }
        
        if (document.querySelector(DOM.gameAwaySixteen)) {
        
            document.querySelector(DOM.gameAwaySixteen).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameAwaySixteen);
            
        });
        
        }
        
        if (UICtrl.getSelection(DOM.gameHomeOne)) {
            document.querySelector(DOM.gameHomeOne).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeOne);
                
            });
        }
        
        if (UICtrl.getSelection(DOM.gameHomeTwo)) {
            document.querySelector(DOM.gameHomeTwo).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeTwo);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeThree)) {
            document.querySelector(DOM.gameHomeThree).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeThree);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeFour)) {
            document.querySelector(DOM.gameHomeFour).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeFour);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeFive)) {
            document.querySelector(DOM.gameHomeFive).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeFive);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeSix)) {
            document.querySelector(DOM.gameHomeSix).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeSix);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeSeven)) {
            document.querySelector(DOM.gameHomeSeven).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeSeven);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeEight)) {
            document.querySelector(DOM.gameHomeEight).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeEight);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeNine)) {
            document.querySelector(DOM.gameHomeNine).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeNine);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeTen)) {
            document.querySelector(DOM.gameHomeTen).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeTen);
                
            });
        }
        
        
        if (UICtrl.getSelection(DOM.gameHomeEleven)) {
            document.querySelector(DOM.gameHomeEleven).addEventListener('click', function (event) {
                'use strict';
                ctrlSelect(DOM.gameHomeEleven);
                
            });
            
        }
        
        if (document.querySelector(DOM.gameHomeTwelve)) {
        
            document.querySelector(DOM.gameHomeTwelve).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameHomeTwelve);
            
        });
        
        }
        
        if (document.querySelector(DOM.gameHomeThirteen)) {
        
            document.querySelector(DOM.gameHomeThirteen).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameHomeThirteen);
            
        });
        
        }
        
        if (document.querySelector(DOM.gameHomeFourteen)) {
        
            document.querySelector(DOM.gameHomeFourteen).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameHomeFourteen);
            
        });
        
        }
        
        if (document.querySelector(DOM.gameHomeFifteen)) {
        
            document.querySelector(DOM.gameHomeFifteen).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameHomeFifteen);
            
        });
        
        }
        
        if (document.querySelector(DOM.gameHomeSixteen)) {
        
            document.querySelector(DOM.gameHomeSixteen).addEventListener('click', function (event) {
            'use strict';
            ctrlSelect(DOM.gameHomeSixteen);
            
        });
        
        }
        
    };
    
    return {
        init: function () {
            setUpListeners();
        }
    };
})(DataController, UIController);

Controller.init();