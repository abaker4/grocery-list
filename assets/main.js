$(function() {

    $.ajax({
        url: '/endpoint/list.php',
        type: 'GET',
        success: function (lists) {
            console.log(lists);
            var listhtml = '<div id="container" class="container"> <div class="row">';
            var i = 0;
            $.each(lists, function (key, list) {
                if (i % 3 == 0 && i !== 0) {
                    listhtml += "</div><div class='row'>";
                }


                listhtml += '<div class="col-lg-4 card list title"><span>' + list.title + '</span>';

                listhtml += '<div class="input-group">' +
                            '<input id="list-input-' + list.id + '" type="text" class="form-control" placeholder="Item" />' +
                            '<input id="add-amount-' + list.id + '" class="form-control" type="number" placeholder="Amount"> '+// create a unique id on the element (e.g id="somethingunique")
                            '<button class="btn btn-primary addButton" data-id="' + list.id + '">Add</button>' +
                            '</div>';

                listhtml+= '<ul class="list-group" id="list-item-group-' + list.id + '">';


                $.each(list.items, function (key, item) {
                    if(item.fulfilled == 1){
                            listhtml += "<div class='list-group-item justify-content-between special fulfilled' data-id='" + item.id + "'>" +
                            "<input class='form-check-input checkbox' type='checkbox' id='fulfilled-input-' "+ item.id + " ' data-id='" + item.id + "'> " + item.title + " " + item.quantity +
                            "<button class='badge badge-pill badge-danger'>-</button>" +
                            "<button id='edit-list-item-" + item.id + "' class='badge badge-pill badge-success editButton' data-id='" + item.id + "'>edit</button>" +
                            "</div>";
                    } else {
                        listhtml += "<div class='list-group-item justify-content-between special' data-id='" + item.id + "'>" +
                            "<input class='form-check-input checkbox' type='checkbox' id='fulfilled-input-' "+ item.id + " '>" + item.title + " " + item.quantity +
                            "<button class=' badge badge-pill badge-danger'>-</button>" +
                            "<button id='edit-list-item-" + item.id + "' class='badge badge-pill badge-success editButton' data-id='" + item.id + "'>edit</button>" +
                            "</div>";
                    }



                });

                listhtml+= '</ul>';

                listhtml += "</div>";
                i++;
            });

            listhtml += '</div></div>';

            $('#test').html(listhtml);


            $('.addButton').on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var addItem = $('#list-input-' + id).val();
                var addAmount = $('#add-amount-' + id).val();
                $('#list-item-group-' + id).append("<div class='list-group-item'>" + addItem + addAmount +
                    "<span class='badge badge-pill badge-danger'>-</span>" +
                    "<span class='badge badge-pill badge-success'>edit</span>" +
                    "</div>");
                $.ajax({
                    url: '/endpoint/item.php',
                    data: {
                        title: addItem,
                        quantity: addAmount,
                        fulfilled: 0,
                        list:id
                        // add list id, and match other properties to the db table item
                    },
                    type: 'POST',
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }

                });

            });



            $('.checkbox').on('change', function(e){
                e.preventDefault();
                var id = $(this).data('id');
                $(this).addClass('fulfilled');

            });


        },/*/.success*/

        error: function (error) {
            console.log(error);
        }
    });


    $('#saveListButton').on('click', function (e) {
        e.preventDefault();
        var listTitle = $('#listTitle').val();
        if (listTitle.length > 2) {
            $.ajax({
                url: '/endpoint/list.php',
                data: {
                    title: listTitle
                },
                type: 'POST',
                success: function (response) {
                    console.log(response);
                    $('#createListModal').modal('hide')
                },
                error: function (error) {
                    console.log(error);
                }

            });

        }
    });




});