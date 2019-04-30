
@extends('layouts.app')

@section('content')
    <div class="container invisible" style="max-width: 800px" id="container">
        <a href="{{ route('crear-lista') }}" class="btn btn-md btn-success my-3 my-sm-3">
            <span class="fas fa-plus mr-1"></span>
            Crear nueva lista
        </a>

        <div class="table-responsive" id="table_resp">
            <table class="table w-auto" id="table_id" >
                <thead class="thead-light">
                    <tr>
                        {{-- <th scope="col" >Id</th> --}}
                        <th scope="col" id="col_estado">Estado</th>
                        <th scope="col" id="col_lista">Lista</th>
                        <th scope="col" id="col_acciones">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($lists as $list)
                <tr>
                    {{-- <th scope="row">{{ $list['id'] }}</th> --}}
                    <td>
                        <a href="#" class="btn btn-sm btn-{{ $list['status']=='Publica' ? 'success' : 'secondary' }} my-1 my-sm-0">
                            <span class="fas fa-{{ $list['status']=='Publica' ? 'unlock' : 'lock' }} mr-1"></span>
                            <span class="d-none d-lg-inline">{{ $list['status'] }}</span>
                        </a>
                    </td>

                    <td>
                        <a href="#" >
                            {{ $list['name'] }}
                        </a>
                    </td>

                    <td>
                        <button href="#" class="btn btn-sm btn-primary my-1 my-sm-0">
                            <span class="fas fa-edit mr-1"></span>
                            <span class="d-none d-lg-inline">Editar</span>
                        </button>

                        <form action="{{ route('eliminar-lista', $list['id'] ) }}" method="POST" style="display: inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger my-1 my-sm-0">
                                <span class="fas fa-trash mr-1"></span>
                                <span class="d-none d-lg-inline">Eliminar</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        function ajustarAncho(){
            maxAncho = document.getElementById("table_resp").clientWidth;
            anchoEstado = document.getElementById("col_estado").clientWidth;
            anchoAcciones = document.getElementById("col_acciones").clientWidth;
            listas = document.getElementById("col_lista");

            listas.style.width = (maxAncho - anchoEstado - anchoAcciones) +"px";

            document.getElementById("container").classList.remove("invisible");
        }
        window.onload = ajustarAncho;

    </script>
@endsection