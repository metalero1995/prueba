@extends('layouts.appfront')

@section('content')

@if(Session::get('perfil') == 'Administrador')

@php
echo "en home";
@endphp

@endif
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Reportes</h3>
        </div>

        <!--
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ir!</button>
                    </span>
                  </div>
                </div>
              </div>
              -->
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Crear reportes <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                @if (Session::has('error'))

                <p class="alert alert-danger alert-dismissible show" role="alert">{{ Session::get('error') }}</p>

                @endif
                <div class="x_content">
                    <br />
                    <form id="demo-form2" name="frmregistra" action="{{route('reporte.store')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo electrónico <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{Auth::user()->email}}" id="correo_reporte2" name="correo_reporte" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Asunto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="asunto_reporte2" value="{{ old('asunto_reporte') }}" name="asunto_reporte" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="descripcion_reporte2" value="{{ old('descripcion_reporte') }}" name="descripcion_reporte" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Estatus <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="revisado_reporte2" name="revisado_reporte" required="required" class="form-control col-md-7 col-xs-12" required>
                                    @foreach($data2 as $revisado)
                                    <option value="{{$revisado->revisado_reporte}}" @if( old ("revisado_reporte")==$revisado->revisado_reporte) selected @endif>{{$revisado->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      --->
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-danger" href="{{ route('reporte.index') }}" type="button">Cancelar</a>
                                <button class="btn btn-primary" type="reset">Limpiar</button>
                                <button onclick="ModalCrear()" type="button" class="btn btn-success">Enviar</button>
                                <button hidden id="enviar" type="submit"></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('jscustom')
<script>
    function ModalCrear() {
        let cont = 0;
        //Valida que los campos obligatorios no estén vacios
        if ($('#correo_reporte2').val().length != 0 && $('#asunto_reporte2').val().length != 0 && $('#revisado_reporte2').val().length != 0 && $('#descripcion_reporte2').val().length != 0) {

            //Valida que ningun campo contenga errores señalados
            if ($("#descripcion_reporte2").hasClass("parsley-error") == false && $("#correo_reporte2").hasClass("parsley-error") == false && $("#asunto_reporte2").hasClass("parsley-error") == false && $("#revisado_reporte2").hasClass("parsley-error") == false) {
                cont = 1;
                setTimeout(() => {
                    Swal.fire({
                        title: '¿Seguro que quieres crear el reporte?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Crear!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.forms["frmregistra"].submit();
                        }
                    })
                }, 300);
            }
        }



        if (cont == 0) {
            $('#enviar').trigger('click');
        }
    }
</script>
@endpush