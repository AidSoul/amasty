    function createATM(){
        $('#bankForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'task3.php',
                data: $(this).serialize(),
                success: function(response)
                {
    
                    $('.conclusion').html('');
                    $('.error').html('');
                  
                    var obj  = JSON.parse(response);
                    if(obj.error == 1){
                        $('.error').html('Поле "Ваша сумма" пустое!');
                    }
                    else{
                        if(obj.error == 2){
                            if(obj.data[0] > 0){
                                $('.error').html('Неверная сумма. Выберите '+obj.data[0]+' или '+obj.data[1]+'.');
                            }
                            else{
                                $('.error').html('Неверная сумма. Выберите 5.');
                            }
                           
                        }
                        else{
                            var a = '<tr><td>Номинал</td><td>Количество</td><tr>';
                    var b;
                    $.each(obj,function(index,value){
                        b = b + '<tr><td>' + index + '</td><td>' + value;
    
                    });
                    
                    $('.conclusion').html(a+b);
                    }
                        }
                     
              
                    
                    console.log(obj);
               }
           });
         });
    }
    