'use strict';

/* Controllers */

function ProductAllCtrl() {
    $.ajax({url: 'Model/Controller.php',
        data: {action: 'AllProduct'},
        type: 'post',
        success: function(output) {
            $('body').append(output);
        }
    });
}

function ProductByCateCtrl($routeParams) {
    $.ajax({url: 'Model/Controller.php',
        data: {action: 'ProductByCate', cateId: $routeParams.CateId},
        type: 'post',
        success: function(output) {
            $('body').append(output);

        }
    });
}

