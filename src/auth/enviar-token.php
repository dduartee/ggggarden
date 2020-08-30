<?php
function enviarToken()
{
    echo '<script src="/public/js/jquery-3.5.1.min.js"></script>';
    echo "<script>
    $.ajax({
        url: '/auth/verify',
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token_jwt')
        },
        })
        .done(function( data ) {
            console.log(data);
    });
</script>";
}
