'use strict';

/* Controllers */

function ProductAllCtrl() {
    $(".loadPanel").show();
    $.ajax({url: 'Model/Controller.php',
        data: {action: 'AllProduct'},
        type: 'post',
        success: function(output) {
            $('body').append(output);
            $(".loadPanel").hide();
        }
    });
}

function ProductByCateCtrl($routeParams) {
    $(".loadPanel").show();
    $.ajax({url: 'Model/Controller.php',
        data: {action: 'ProductByCate', cateId: $routeParams.CateId, parentId: $routeParams.ParentId},
        type: 'post',
        success: function(output) {
            $('body').append(output);
            $(".loadPanel").hide();
        }
    });
}

