function set_module(included, action, id)
    {
         console.log( "moduled is working" );
        $.ajax({
            url: 'redir.php',
            type: 'POST',
            data: {'included': included, 'id': id, 'action': action , 'moduled': true},
            success: function(response) {
                window.location.href = "index.php";
            },

        });
    }


       function set_class(inc_class, inc_function, variable)
    {
         console.log( "classed is working" );
        $.ajax({
            url: 'redir.php',
            type: 'POST',
            data: {'inc_class': inc_class, 'inc_function': inc_function, 'variable': variable, 'classed': true},
            success: function(response) {
                window.location.href = "index.php";
            },

        });
    }

    function set_message(html_class, text)
    {
         console.log( "classed is working" );
        $.ajax({
            url: 'redir.php',
            type: 'POST',
            data: {'html_class': html_class, 'text': text},
            

        });
    }