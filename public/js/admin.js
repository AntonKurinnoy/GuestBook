$(document).ready(function() {

    $('input[name^="blockUser"]').on('change',function(){
        
        var id = $(this).attr('data');
        var block = $(this).val();

        var data = {'id':id, 'block':block};

        $.ajax({
            type: 'POST',
            url: url+'/block',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: data,
            success: function(result){
    
                if (result == 'success'){
                    alert('Everything is good!');
                } else{
                    alert('Whooops!');
                }
            }
        });
        
    });

});