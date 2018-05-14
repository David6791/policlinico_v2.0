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
    /* Editar Especialidades */
    $(document).on('click','.editSpecialties',function(e){         
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/editSpecialties',
            data:{id_specialties:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#editSpecialtiesModal').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#name_specialties').val(data[0].nombre_especialidad)
                $('#description').val(data[0].descripcion_especialidad)
                $('#id_specialties').val(data[0].id_especialidad)
            },
            error:function(data){
                //console.log(data)
            }
        })        
    })
    // Guardar datos editados de Especialidades
    $(document).on('submit','.sendform_save_edit_Specialties',function(e){
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
    // Guardar datos de Nueva Asignacion de Horarios a Usuarios
    $(document).on('submit','.send_form_assignments',function(e){
        $('#exampleModal').modal('toggle')
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
    $(document).on('click','.viewAssignments',function(e){
        $('.tabla_llenar tbody tr').closest('tr').remove() 
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_Assignments',
            data:{id_user:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#modalViewAssignments').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#view_name').text(data[0].name +" "+ data[0].apellidos)
                $('#view_tipo').text(data[0].nombre_tipo)
                var da = (data).length
                //console.log(da)
                for(var i = 0; i < da ; i++)
                {
                    $('.tabla_llenar tbody').append('<tr style="text-align:center"><td>'+data[i].name_schedules+'</td><td>'+data[i].schedules_start+'</td><td>'+data[i].schedules_end+'</td><td>'+data[i].state+'</td></tr>')
                }
                
            },
            error:function(data){
                //console.log(data)
            }
        })        
    })
    $(document).on('click','.editAssignments',function(e){
        $('.table_add tbody tr').closest('tr').remove() 
        $('.table_remove tbody tr').closest('tr').remove() 
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/edit_Assignments',
            data:{id_user:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#modalEditAssignments').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#id_user1').val(data.datos[0].id_user)
                $('#view_name1').text(data.datos[0].name +" "+ data.datos[0].apellidos)
                $('#view_tipo1').text(data.datos[0].nombre_tipo)
                var da = (data.datos).length
                var da1 = (data.datos1).length
                var x = 0
                console.log(da)
                for(var i = 0; i < da ; i++)
                {
                    x = i+1
                    $('.table_add tbody').append('<tr style="text-align:center"><td>'+x+'</td><td>'+data.datos[i].name_schedules+'</td><td><input type="checkbox" name="schedul_add[]" value="'+data.datos[i].id_schedule+'"></td></tr>')
                }
                for(var i = 0; i < da1 ; i++)
                {
                    x = i +1
                    $('.table_remove tbody').append('<tr style="text-align:center"><td>'+x+'</td><td>'+data.datos1[i].name_schedules+'</td><td><input type="checkbox" name="schedul_remove[]" value="'+data.datos1[i].id_schedule+'"></td></tr>')
                }
                
            },
            error:function(data){
                //console.log(data)
            }
        })        
    })
    /* Editar asignacion de Horarios a  usuarios  */
    $(document).on('submit','.send_form_assignments_edit',function(e){
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
    /*$(document).on('click','.sel',function(e){
        e.preventDefault(e)
        alert('Medico')
    })*/
    /* Funcion para reservar cita medica mediante medico de turno y especialidad */
    $(document).on('click','.reservationMedic',function(e){
        e.preventDefault(e)
        //alert('Medico')
        $.ajax({
            type:'GET',
            url:'/create_medical_appointments',
            data:$(this).serialize(),
            success:function(data){
                $('#load_page_appointsment').html(data)
                //alert("asdsad")
            }
        })       
    })
    /* Reservacion de cita medica de acuerdo a fechas disponibles mediante calendario */
    $(document).on('click','.reservationDate',function(e){
        e.preventDefault(e)        
        //alert('Fecha')
        $.ajax({
            type:'GET',
            url:'/create_date_appointments',
            data:$(this).serialize(),
            success:function(data){
                $('#load_page_appointsment').html(data)
            }
        })
    })
    /* Funcion para revisar los turnos segun los datos de la fecha */
    $(document).on('click','.view_turns_day',function(e){
        //$('#load_datos_user_appoinments').remove()
        e.preventDefault(e)       
        //alert('Fecha')
        $.ajax({
            type:'GET',
            url:'/view_turns_day_date',
            data:$(this).serialize(),
            data:{fecha:$('input:text[name=fecha_viaje]').val(),id_turno:document.getElementById("selec_schedule").value,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#table_load_turns').html(data)
                //alert($('input:text[name=fecha_viaje]').val())
            }
        })
    })

    /* Funcion para mostrar horario seleccionado y seleccionar Usuario */
    $(document).on('click','.create_assignments',function(e){
        e.preventDefault(e)
        $.ajax({
            type:'GET',
            url:'/create_assignments_view_user_medics',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),fecha:$('input:text[name=fecha_viaje]').val(),id_turno:document.getElementById("selec_schedule").value,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#datatable').remove()
                //alert(data)
                $('#load_datos_user_appoinments').html(data)
                console.log(data.fecha)
                $('#date_appointsment').val()
            }
        })
    })
    $(document).on('click','.search',function(e){
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_patient_dates',
            data:$(this).serialize(),
            data:{ci_patient:$('input:text[name=ci_patient]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#load_dates_patient').html(data)               
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('submit','.sendform_insert_appointsment',function(e){
        //alert("llego")
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        console.log($(this).serialize())
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){
                $("#contentGlobal").html(data)
                swal("", "Se Registro Correctamente la Cita Medica.", "success")                
            },
            error:function(data){
                
            }
        })
    })
    $(document).on('click','.modifi_state_appointment',function(e){  
        $('#modifi_state_appointment_Modal').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        $('#id_medical_appointments').val(id=$(this).attr('value'))
    })
    $(document).on('click','.modifi_appointments',function(e){
        $('#modifi_state_appointment_Modal').modal('toggle')
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/modifi_appointments_save',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),id_appointments:$('input:hidden[name=id_medical_appointments]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)            
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('click','.load_date_medic',function(e){
        $('#modalSelect_date').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })     
        $('#id_schedul').val(id=$(this).attr('value'))   
    })
    $(document).on('click','.btn_select_date_cita',function(e){
        $('#modalSelect_date').modal('toggle')
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/select_turns_free',
            data:$(this).serialize(),
            data:{id_schedule:$('input:hidden[name=id_schedul]').val(),fecha:$('input:text[name=fecha]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#load_list_medics').remove()
                //$("#contentGlobal").html(data)
                $('#table_load_turns').html(data)         
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('click','.create_assignments_medic',function(e){
        alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_medic_patients',
            data:$(this).serialize(),
            data:{id_turn:$(this).attr('value'),id_assignments:$('input:hidden[name=id_schedul]').val(),fecha:$('input:hidden[name=fecha]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#load_list_medics').remove()
                //$("#contentGlobal").html(data)
                $('#table_load_turns').html(data)
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('submit','.sendform_insert_appointsment_medic',function(e){
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
    $(document).on('click','.search_patient',function(e){
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/search_patients',
            data:$(this).serialize(),
            data:{ci_patient:$('input:text[name=ci_patient]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                //$("#contentGlobal").html(data)
                //$('#table_load_turns').html(data)
                $('#name_patient').val(data[0].nombres)
                $('#apaterno_patient').val(data[0].ap_paterno)
                $('#amaterno_patient').val(data[0].ap_materno)
                $('#fnacimiento_patient').val(data[0].fecha_nacimento)
                $('#sexo').val(data[0].sexo)
                $('#direccion_patient').val(data[0].direccion)
                $('#id_patient').val(data[0].id_paciente)
                swal(
                    '',
                    'El Paciente esta registrado',
                    'success'
                  )
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('submit','.store_emergencies',function(e){
        //alert("asdasdsa")
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
    $(document).on('click','.start_appointment',function(e){
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/start_appointment_date',
            data:$(this).serialize(),
            data:{id_appointments:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $("#contentGlobal").html(data) 
                swal(
                    '',
                    'El Paciente esta registrado',
                    'success'
                  )
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
})