$(function(){
    $('.load-page').click(function(){ 
        url = $(this).attr('href')
        
        $("#contentGlobal").html('')
        $("#contentGlobal").load(url)
        return false;
    })   
    $(document).on('click','.agregar_medico',function(e){      
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/crear_medicos',
            data:{_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.agregar_enfermera',function(e){      
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/crear_enfermeras',
            data:{_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.agregar_dentista',function(e){      
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/crear_dentistas',
            data:{_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('submit','.sendform',function(e){
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){
            
                console.log(data);
                swal(
                    'Felicidades',
                    'Los datos de '+ data +' se guardaron correctamente',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    /* para mostrar los datos de un medico. */
    $(document).on('click','.getVerMedico',function(e){    
        //alert('hola')  
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/verMedicos',
            data:{id_medico:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.get_BajaUser',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/darBajaUser',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.sel',function(e){
        e.preventDefault(e)
        var valor = document.getElementById("texto").value;
        alert(valor+'asd')
    })
})