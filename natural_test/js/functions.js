/**
 * Created by refaelgold on 9/26/14.
 */


function updateCars(opts){

    $.ajax({
        type: "POST",
        url: "submit.php",
        dataType : 'json',
        cache: false,
        data: {filterOpts: opts},
        success: function(records){
            $('#cars tbody').html(makeTable(records));

        },
        failure:function(data){
            console.log(data);
        }

    });
}


function updateSorting(searchKey,opts){

    $.ajax({
        type: "POST",
        url: "sorting.php",
        dataType : 'json',
        cache: false,
        data: {searchKey: searchKey,filterOpts:opts},
        success: function(records){
            $('#cars tbody').html(makeTable(records));

        },
        failure:function(data){
            console.log(data);
        }

    });
}


function getFinalPrice(opts){

    $.ajax({
        type: "POST",
        url: "final_price.php",
        dataType : 'json',
        cache: false,
        data: {filterOpts: opts},

        success: function(finalPrice){
            $('.final-price').html(JSON.stringify(parseInt(finalPrice[0]['TotalPrice'])));

        },
        failure:function(data){
            console.log(data);
        }

    });
}




function makeTable(data){
    var tbl_body = "";
    $.each(data, function() {
        var tbl_row = "";
        var indexForModel=0;
        $.each(this, function(k, v) {
            if (indexForModel==1) {
                tbl_row += "<td title='' class='model-column'>" + v + "</td>";
            }
            else{
                tbl_row += "<td>" + v + "</td>";
            }
            indexForModel++;

        })
        tbl_body += "<tr>"+tbl_row+"</tr>";
    })
    return tbl_body;
}


function getContinentTitle(opts){
    $.ajax({
        type: "POST",
        url: "continent.php",
        dataType : 'json',
        cache: false,
        data: {filterOpts: opts},
        success: function(records){
            $.each(records, function(index, val) {
                //Cache bug
                console.log(index);
                console.log(val);
                console.log("*******Cache bug , information come and go*********");

                jQuery('.model-column').eq(index).attr('title',val.Continent);
            });
        },
        failure:function(data){
            console.log(data);
        }

    });
}





function getCarFilterOptions(){
    var opts = [];
    $checkboxes.each(function(){
        if(this.checked){
            opts.push(this.name);
        }
    });
    return opts;
}

