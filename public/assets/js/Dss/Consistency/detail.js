$(document).ready(function(){function e(e,t){var a=!0;return e=parseInt(e),t=parseInt(t),console.log(e,t),e>t?parseInt(e/t)!==e/t&&(a=!1):parseInt(t/e)!==t/e&&(a=!1),a}var t,a,n=$("input.criteriaField"),r=n.length;for(t=0;r>t;t++)$('select[name^="RightValue['+n[t].value+']"]').each(function(r){var l,i;l=n[t].value,i=n[r].value,$(this).change(function(){return"undefined"==typeof $.data(this,"current")&&$.data(this,"current",1),a=parseInt($('select[name^="RightValue['+i+"]["+l+']"]').val()),e(a,$(this).val())!==!0?(alert("The comparison value result must be integer"),$(this).val($.data(this,"current")),!1):($('select[name^="LeftValue['+i+"]["+l+']"]').val($(this).val()),void $.data(this,"current",$(this).val()))})});for(t=0;r>t;t++)$('select[name^="LeftValue['+n[t].value+']"]').each(function(r){var l,i;l=n[t].value,i=n[r].value,$(this).change(function(){return"undefined"==typeof $.data(this,"current")&&$.data(this,"current",1),a=$('select[name^="LeftValue['+i+"]["+l+']"]').val(),e(a,$(this).val())!==!0?(alert("The comparison value result must be integer"),$(this).val($.data(this,"current")),!1):($('select[name^="RightValue['+i+"]["+l+']"]').val($(this).val()),void $.data(this,"current",$(this).val()))})})});