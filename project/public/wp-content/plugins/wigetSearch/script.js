window.onload = function(){
        $('#search-button').on('click', function(){
            $.ajax({
                url: window.wp_data.ajax_url,
                type: 'POST',
                data: 'action=intexosft&param1=' + $('#search-input').val() + '', // можно также передать в виде массива или объекта
                success: function( data ) {
                    $('#wrap-search').html(data);
                }
            });
        });

    }

