$(function() {

    $.ajax({
        url: '/endpoint/list.php',
        type: 'GET',
        success: function (lists) {
            console.log(lists);
            var listhtml = '<div id="container" class="container"> <div class="row text-center mb-2">';
            var i = 0;
            $.each(lists, function (key, list) {
                if (i % 3 == 0 && i !== 0) {
                    listhtml += "</div><div class='row text-center'>";
                }


                listhtml += '<div class="col mx-1 card list title"><span class="title">' + list.title + '</span>';

                listhtml += '<div class="input-group">' +
                            '<input id="list-input-' + list.id + '" type="text" class="form-control" placeholder="Item" />' +
                            '<input id="add-amount-' + list.id + '" class="form-control" type="number" placeholder="Amount"/>'+// create a unique id on the element (e.g id="somethingunique")
                            '<button class="btn btn-primary addButton" data-id="' + list.id + '">Add</button>' +
                            '</div>';

                listhtml+= '<ul class="list-group" id="list-item-group-' + list.id + '">';


                $.each(list.items, function (key, item) {
                    listhtml += generateItemHTML(item);
                });

                listhtml+= '</ul>';

                listhtml += "</div>";
                i++;
            });

            listhtml += '</div></div>';

            // @todo update this div to have a better name
            $('#test').html(listhtml);

            $('.addButton').on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var addItem = $('#list-input-' + id).val();
                var addAmount = $('#add-amount-' + id).val();


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
                        var item = response.records;
                        var itemHTML = generateItemHTML(item);
                        $('#list-item-group-' + id).append(itemHTML);
                    },
                    error: function (error) {
                        alert('Error adding item');
                    }

                });

            });



            $('.checkbox').on('click', function(e){
                e.preventDefault();
                var id = $(this).data('id');
               $(this).parent().toggleClass('fulfilled');

               // add update to fulfilled

            });

            $('.remove').on('click', function(){
                var id = $(this).data('id');
                $(this).closest('div').remove();
                $.ajax({
                    url:'/endpoint/list.php',
                    data: {
                        id: id
                    },
                    type: 'DELETE',
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (error){
                        console.log(error);
                    }
                });
            });

            $('.editButton').on('click', function(){
                var itemId = $(this).data('id');

                $('#item' + itemId + " .item-title").hide();
                $('#item' + itemId + " .action-btns").hide();


                $('#item' + itemId + " .item-edit").show();
                $('#item' + itemId + " .update-btn").show();
                $('#editItem' + itemId + " input").focus();

                $('#item' + itemId + " .submit").on('click', function(e){
                    e.preventDefault();
                    var newTitle = $('#item' + itemId + " .item-edit input").val();

                    // @todo add on more to update
                    var newItem = {
                        id: itemId,
                        title: newTitle
                    };
                    updateItem(newItem);

                    $('#item' + itemId + " .item-title").html(newTitle).show();
                    $('#item' + itemId + " .action-btns").show();
                    $('#item' + itemId + " .item-edit").hide();
                    $('#item' + itemId + " .update-btn").hide();


                });
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


    function generateItemHTML(item) {
        var itemHTML = '';
        var extraClass = '';

        if (item.fulfilled === 1) {
            extraClass = 'fulfilled';
        }

        itemHTML += "<div class='list-group-item justify-content-between " + extraClass + "' data-id='" + item.id + "' id='item" + item.id + "'>" +
            "<input class='form-check-input checkbox' type='checkbox' id='blankCheckbox' data-id='" + item.id + "'/>" +
            "<span class='item-title'>"+ item.title + "</span>" +
            "<span class='item-edit' style='display:none'>" +
                '<input type="text" maxlength="20" value="' + item.title + '" />' +
            "</span>" +
            "<span class='item-quantity'>" + item.quantity + "</span>" +
            "<div class='action-btns'>" +
                "<button class='badge badge-pill badge-danger remove' data-id='" + item.id + "'>-</button>" +
                "<button id='edit-list-item-" + item.id + "' class='badge badge-pill badge-success editButton' data-id='" + item.id + "'>edit</button>" +
            "</div>" +
            "<div class='update-btn' style='display:none'>" +
                '<button id="add-editable-text" class="btn btn-success btn-sm submit">UPDATE</button>' +
            "</div>" +
            "</div>"
        ;

        return itemHTML;

    }


    /**
     *
     * @param newItem
     *
     * {
     *   id: 4, // required
     *   title: 'grapes',
     *   fulfilled: 0,
     *   quantity: 10
     *   list: 4
     * }
     */
    function updateItem(newItem) {
        $.ajax({
            url: '/endpoint/item.php',
            data: newItem,
            type: 'PUT',
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }

        });
    }




});