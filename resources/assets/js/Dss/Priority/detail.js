/**
 * Created by bambang.as on 1/26/2016.
 */


$(document).ready(function(){
    // Variable declaration
    var i,
        criteriaField = $('input.criteriaField'),
        criteriaLength = criteriaField.length,
        changeValue;

    /**
     * Dss compare value
     *
     * @param {number} value1 First value parameter.
     * @param {number} value2 Second value parameter.
     *
     * @returns boolean
     */
    function dssCompareValue(value1, value2){
        var result = true;
        value1 = parseInt(value1);
        value2 = parseInt(value2);
        console.log(value1, value2);
        if(value1 > value2){
            if(parseInt(value1/value2) !== value1/value2){
                result = false;
            }
        }else{
            if(parseInt(value2/value1) !== value2/value1){
                result = false;
            }
        }
        return result;
    }

    for(i=0;i<criteriaLength;i++){
        $('select[name^="RightValue[' + criteriaField[i].value + ']"]').each(function (index){
            var rowIndex, colIndex;
            rowIndex= criteriaField[i].value;
            colIndex = criteriaField[index].value;
            $(this).change(function(){
                if(typeof $.data(this, 'current') === 'undefined'){
                    $.data(this, 'current', 1);
                }
                changeValue = parseInt($('select[name^="RightValue[' + colIndex + '][' + rowIndex + ']"]').val());
                if(dssCompareValue(changeValue, $(this).val()) === true){
                    $('select[name^="LeftValue[' + colIndex + '][' + rowIndex + ']"]').val($(this).val());
                }else{
                    alert('The comparison value result must be integer');
                    $(this).val($.data(this, 'current'));
                    return false;
                }
                $.data(this, 'current', $(this).val());
            });
        });
    }
    for(i=0;i<criteriaLength;i++){
        $('select[name^="LeftValue[' + criteriaField[i].value + ']"]').each(function (index){
            var rowIndex, colIndex;
            rowIndex= criteriaField[i].value;
            colIndex = criteriaField[index].value;
            $(this).change(function(){
                if(typeof $.data(this, 'current') === 'undefined'){
                    $.data(this, 'current', 1);
                }
                changeValue = $('select[name^="LeftValue[' + colIndex + '][' + rowIndex + ']"]').val();
                if(dssCompareValue(changeValue, $(this).val()) === true){
                    $('select[name^="RightValue[' + colIndex + '][' + rowIndex + ']"]').val($(this).val());
                }else{
                    alert('The comparison value result must be integer');
                    $(this).val($.data(this, 'current'));
                    return false;
                }
                $.data(this, 'current', $(this).val());
            });
        });
    }
});