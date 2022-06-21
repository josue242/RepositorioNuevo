@extends('plantilla')

@section('content')
<center>
    {{-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6"> --}}
                        <br>
                        <br>
                        <br>
                    
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                    <div class="card card-header"><h1 class="display-8 fw-bold mt-0">Usuario</h1></div>
                                        <div class="card-body">
                                            <form class = "row g-3" action="{{ route('mostrar.update',$id_usuario = session("usuario_id"))}} "method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                            <p class="card-text">
                                                <label for="documento" class="form-label">Información personal</label>
                                                <div class="author">
                                                    <div class="panel-heading">¡¡Bienvenido!! {{ auth()->user()->name }}</p>
                                                    </div>
                                                        <img src="{{asset('\img\usuario.png')}}" class="img-thumbnail" alt="Cinque Terre">
                                                    </a>
                                                    <div class="col-md-8">
                                                        <label for="documento" class="form-label">Nombre: </label>
                                                        <input type="text" name="name" value="{{ auth()->user()->name }}">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label for="documento" class="form-label">Correo: </label>
                                                        <input type="text" name="email" value="{{ auth()->user()->email }}">

                                                    </div>
                                                    <div class="col-md-8">
                                                        <label for="documento" class="form-label">Contraseña: </label>
                                                        <input type="password" name="password" value="{{ auth()->user()->password }}">

                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                                                    <br>
                                                   <br>
                                                    <a class="btn btn-success  btn-lg"  href="{{ url('/logout')}}" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Cerrar Sesion</a>
                                                </div>
                                            </form>    
                                            </p>    
                                        </div>
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </center>
                    <br>
                    <br>
                    <style>
                        form{
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;
                        }
                        .btn-form{
                            box-sizing: border-box;
                            margin-top: 30px;
                        }
                        .col-xxl-4{
                            width: 30%;
                            margin-left: auto;
                            margin-right: auto;
                        }
                        .container{
                        
                            margin-left: auto;
                            margin-right: auto;
                        }
                        .feature{
                            height: 10rem;
                        width: 10rem;
                        font-size: 8ch;
                        background-color: rgb(65, 9, 117) !important;
                        }
                        .btn-primary{
                            --bs-bg-opacity: 1;
                        background-color: rgb(65, 9, 117) !important;
                        }
                        
                        
                        .bg-dark {
                            --bs-bg-opacity: 1;
                        background-color: rgb(65, 9, 117) !important;
                        }
                        .bg-orange{
                            background-color: rgb(184, 129, 12) !important;
                        }
                    </style>
        
                    
                </div>    
            </div>   
        </div>
    </div>
@endsection  