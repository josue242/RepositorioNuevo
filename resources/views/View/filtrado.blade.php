@extends('plantilla')
@section('content')         
            <div class="container px-lg-7">
                <form class="row g-3" method="post" action="{{ route('filtrado') }}">
                    @csrf
                <center>
                <h1 class="display-5 fw-bold mt-0">EXPLORAR</h1>
                </center>
     
                            <div class="col-md-8">
                                <label for="titulo" class="form-label">Inserte titulo o tema </label>
                                <input type="text" class="form-control" id="titulo" name="titulo">
                            </div>
                            <input type="int" value="{{ $id }}" hidden name="id">
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-primary btn-form" style="display: block"><i class="fa-solid fa-magnifying-glass" target="_blank"></i>     Buscar</button>
                            
                            </div>
                            
                        </form>
        
                   
                  

           
                 
                    <section class="pt-4">
                        <div class="container px-lg-5">
        
                                <div class="d-grid gap-2 col-5 mx-auto">
                                    <a class="btn btn-warning" href="{{ url('/dropzone') }}" role="button">Subir Archivo</a>
                                    
                                    
                                </div>
                        </div>
                    </section>
            
                </div>
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
     
           
           
      


@endsection

