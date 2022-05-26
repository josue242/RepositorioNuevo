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
            <img src="{{asset('img/Logo.jpeg')}}" alt="logo" width="14%" height="auto" margin_left=auto margin_right= auto>

            <div class="container px-lg-5">
                <a class="navbar-brand" href="#!">Colegio de profesionistas, compatir conocimiento</a>
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"><i class="fa fa-home" aria-hidden="true"></i>
                             home</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#!"><i class="fa-solid fa-user"></i> usuario</a></li>
                    </ul>
                    
                </div>
                
            </div>
        </nav>
    </head>
    <br>
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
        .card-header{
            --bs-bg-opacity: 1;
        background-color: rgb(233, 211, 10) !important;

        }
        .card-body{
            --bs-bg-opacity: 1;
        background-color: rgb(236, 234, 238) !important;

        }
        .form-group{
            background-color: rgb(241, 236, 245) !important;
        }

        .bg-dark {
            --bs-bg-opacity: 1;
        background-color: rgb(65, 9, 117) !important;
        }
        .bg-orange{
            background-color: rgb(184, 129, 12) !important;
        }
    </style>
                </form>
                <section style= "pading-top:60px">
                    <div class="container">
                <div class="row-3">
                    <div class="col-md-12">
                        <div class="card">
                           
                            
                            <div class="card-header">
                                Subir Archivo
                            </div>
                            <div class="card-body">
                                <form class = "row g-3" action="{{route('dropzone.store')}}" method= "POST"  enctype="multipart/form-data" class="dropzone dz-clickable" 
                                >
                                <div class="form-group">
                                    @csrf
                                    <label for="foto">Archivo:</label>
                                    <input type="file" id="file" accept="image/png, image/jpeg, image/pdf" 
                                     class="form-control" name="file" 
                                     onchange="previewImage(event,'file');"
                                      />
                                      <img src="" id="file" >
                                </div>

                                   
                                    @csrf
                                    
                                        <div class="col-md-4">
                                            <label for="documento" class="form-label">Titulo</label>
                                            <input type="text" class="form-control" id="documento" name="documento">
                                        </div>
                        
                                        <div class="col-md-4">
                                            <label for="descripcion" class="form-label">Descripcion</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tema" class="form-label">Tema</label>
                                        <select class="form-select" name="tema" aria-label="Default select example">
                                            @foreach($tema as $tem)
                                                <option value="{{$tem->id}}">{{$tem->descripcion}}</option>";
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tipo" class="form-label">Tipo Material</label>
                                        <select class="form-select" name="tipo" aria-label="Default select example">
                                            @foreach($tipomateriales as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>";
                                            @endforeach
                                          </select>
                                        </div>
                        
                                          <div class="col-md-4">
                                            <label for="nomenclatura" class="form-label">Nomenclatura</label>
                                            <input type="text" class="form-control" id="nomenclatura" name="nomenclatura">
                                          </div>
                                          <div class="col-md-4">
                                            <label for="ubicacion" class="form-label">Ubicacion</label>
                                            <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                                          </div>
                                   
                                </div>
                                <br>
                                <br>
                            </div>
                           
                              
                                <center>
                                    <button type="submit" class="btn btn-warning btn-lg">Guardar</button>
                                    <button type="submit" class="btn btn-danger btn-lg">Cancelar</button>
                                </center>
                                </form>
                                <br>
                                <br>
    <section style= "pading-top:60px">
        <div class="container">
            
                    

                        </div>
                    </div>
                    
                </div>
               
            </div>
            <br>
            <br>
        </div>  

       
    </section>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.min.js" integrity="sha512-ALYIaHxbPRTWdNH4oNgOY8QUEVxukOdn2e/Z4dXcGGnY0mHGg4556b6sWH7KMEDzEMG9V9tvXZoYk21s7FMz2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.js" integrity="sha512-FFyHlfr2vLvm0wwfHTNluDFFhHaorucvwbpr0sZYmxciUj3NoW1lYpveAQcx2B+MnbXbSrRasqp43ldP9BKJcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/basic.min.css" integrity="sha512-MeagJSJBgWB9n+Sggsr/vKMRFJWs+OUphiDV7TJiYu+TNQD9RtVJaPDYP8hA/PAjwRnkdvU+NsTncYTKlltgiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <body>



  


  
</body>
</html>