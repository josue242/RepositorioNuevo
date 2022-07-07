<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Colegio de profesionistas </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="asset({img/taller})" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/f687c855f2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css" integrity="sha512-qkeymXyips4Xo5rbFhX+IDuWMDEmSn7Qo7KpPMmZ1BmuIA95IPVYsVZNn8n4NH/N30EY7PUZS3gTeTPoAGo1mA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="{{asset('image/logo2.png')}}" alt="logo" width="7%" height="auto" margin_left=auto margin_right= auto>
            <a class="navbar-brand"><h5>COLEGIO DE PROFESIONISTAS COMPARTIR EL CONOCIMIENTO A.C.</h5></a>
            <br>
            <br>
            <div class="container px-lg-5">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url()->previous() }}"><i class="fa fa-home" aria-hidden="true"></i>
                             home</a></li>
                             @if ($esAdministrador == true )
                             <li class="nav-item"><a class="nav-link" href="{{ url('/mostrar') }}"><i class="fa-solid fa-user"></i> {{ auth()->user()->name }}</a>

                             @endif
                    </ul>
                    
                </div>
                
            </div>
        </nav>
    </head>
    <br>
            
             <a class="btn btn-primary" href="{{ url()->previous() }}" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>Regresar</a>
    <center>
        <h1 class="display-8 fw-bold mt-0">COLEGIO DE PROFESIONISTAS, COMPARTIR CONOCIMIENTO</h1>
    </center>

    <div class="p-4 p-lg-5 bg-light rounded-3 text-center">

        <div class="m-2 m-lg-5">

            <table class="table responsive table-striped">
                <tbody>
                    <tr>

                        <th scope="col">Fecha</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Vizualizar</th>
                        <th scope="col">Acciones</th>
                    </tr>
                   
                    @foreach ($sql as $sq)
                        <form action="{{ route('delete', $sq->id) }}" method="post">
                            @csrf
                            <input type="int" value="{{ $id }}" hidden name="id">
                            <tr>

                                <td>
                                    {{ $sq->fecha }}
                                </td>

                                <td>

                                    {{ $sq->documento }}

                                </td>


                                <td>
                                    <a href="{{ $sq->url }}"target="_blank">{{ $sq->url }}<br></a>
                                    @foreach (preg_split('/\|/', $sq->file) as $archivo)
                                        <a href="/./images/{{ $archivo }}" target="_blank">
                                            {{ $archivo }} <br> </a>
                                    
                                    @endforeach

                                </td>


                                <td>

                                    <a class="btn btn-warning  btn-sm" href="{{ url('download/' . $sq->id) }}"
                                        role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                        Descargar</a>



                                    @php
                                    @endphp
                                    @if ($esAdministrador === true)
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i> Delete</button>

                                        <a class="btn btn-success  btn-sm" href="{{ route('busqueda.edit', $sq->id) }}"
                                            role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Editar</a>
                                </td>
                            @else
                    @endif
                    </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>

            <style>
                form {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                }

                .btn-form {
                    box-sizing: border-box;
                    margin-top: 30px;
                }

                .fa-scale-balanced,
                .fa-book,
                .fa-file-signature,
                .fa-people-line,
                .fa-users-between-lines,
                .fa-people-group,
                .fa-users-gear {

                    font-size: 8ch;
                }

                .col-xxl-4 {
                    width: 30%;
                    margin-left: auto;
                    margin-right: auto;
                }

                .feature {
                    height: 10rem;
                    width: 10rem;
                    font-size: 8ch;
                    background-color: rgb(65, 9, 117) !important;
                }

                .bg-dark {
                    --bs-bg-opacity: 1;
                    background-color: rgb(65, 9, 117) !important;
                }
            </style>
        </div>
    </div>
    </div>
</header>
           
    
    
</body>
</html>