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


                listhtml += '<div class="col card list title"><span>' + list.title + '</span>';

                listhtml += '<div class="input-group">' +
                            '<input id="list-input-' + list.id + '" type="text" class="form-control" />' + // create a unique id on the element (e.g id="somethingunique")
                            '<button class="btn btn-primary addButton" data-id="' + list.id + '">Add</button>' +
                            '</div>';

                listhtml+= '<ul class="list-group" id="list-item-group-' + list.id + '">';
                listhtml+= '</ul><li class="list-group-item">';

                $.each(list.items, function (key, item) {
                    listhtml += "<div class='list-group form-inline'>"+ item.title +
                                "<button class='badge badge-pill badge-danger pull-right'>-</button>" + // add a way you can access the database row id for this item
                                "<button id='edit-list-item-" + item.id + "' class='badge badge-pill badge-success pull-right editButton' data-id='" + item.id + "'>edit</button>" + // add a way you can access the database row id for this item
                                "</div>"
                });

                listhtml += "</div>";
                i++;
            });

            listhtml += '</div></div>';

            $('#test').html(listhtml);


            $('.addButton').on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var addItem = $('#list-input-' +id).val();
                $('#list-item-group-' + id).append("<div class='list-group form-inline'>" + addItem +
                                                   "<span class='badge badge-pill badge-danger pull-right'>-</span>" +
                                                   "<span id='edit' class='badge badge-pill badge-success pull-right'>edit</span>" +
                                                   "</div>");
                $.ajax({
                    url: '/endpoint.item.php',
                    data: {
                        item: addItem
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



            // $('.list').on('click', function() {
            //     alert($(this).data('id'));
            // });
        },
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