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
    /* Funcion para dar de baja especialidades */
    $(document).on('click','.get_BajaSpecialty',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/darBajaSpecialtys',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('submit','.sendform_schedules',function(e){
        $('#close_save_modal').trigger('click') 
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){ 
            
                $("#contentGlobal").html(data)          
                swal(
                    'Felicidades',
                    'Los datos de se guardaron correctamente',
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
    $(document).on('submit','.sendform_schedules1',function(e){
        $('#exampleModal1').modal('toggle')
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){  
                $("#contentGlobal").html(data)          
                swal(
                    'Felicidades',
                    'Los datos de se guardaron correctamente',
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
    /* Baja Horarios para asignacion de usuarios */
    $(document).on('click','.get_BajaSchedule',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/darBajaSchedules',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.get_EditSchedule',function(e){          
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/edit_Schedules',
            data:{id_Schedules:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#exampleModal1').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#name_schedules').val(data[0].name_schedules)
                $('#hour_start').val(data[0].schedules_start)
                $('#hour_end').val(data[0].schedules_end)
                $('#hour_description').val(data[0].description)
                $('#id_schedule').val(data[0].id_schedule)                
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