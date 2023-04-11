@extends('bases.base')

@section('extra_css')
@endsection

@section('content')
    <h5>Buscar por DNI</h5>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>dni</th>
                            <th>nombres</th>
                            <th>ape_paterno</th>
                            <th>ape_materno</th>
                            <th>sexo</th>
                            <th>fecha_nacimiento</th>
                            <th>fecha_ingreso</th>
                            <th>modalidad</th>
                            <th>lugar_trabajo</th>
                            <th>ocupacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trabajadores as $tra)
                            <tr>
                                <td>{{ $tra->id }}</td>
                                <td>{{ $tra->dni }}</td>
                                <td>{{ $tra->nombres }}</td>
                                <td>{{ $tra->ape_paterno }}</td>
                                <td>{{ $tra->ape_materno }}</td>
                                <td>{{ $tra->sexo }}</td>
                                <td>{{ $tra->fecha_nacimiento }}</td>
                                <td>{{ $tra->fecha_ingreso }}</td>
                                <td>{{ $tra->modalidad }}</td>
                                <td>{{ $tra->lugar_trabajo }}</td>
                                <td>{{ $tra->ocupacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra_js')
    <script src="../../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../../../assets/js/table-datatable.js"></script>


    <script>
        // $('#example2 thead th').each( function (i) {
        //     var title = $(this).text(); //es el nombre de la columna
        //    //este if es para filtrar las columnas que no quiero que se hagan las busquedas
        //     if (!(title == 'Id' || title == 'ocupacion')) {

        //         $(this).html( '<label  class="text-capitalize">'+title+'</label><br><input type="text" class=" text-center rounded" placeholder="Buscar por '+title+'" />' );

        //         $( 'input', this ).on( 'keyup change', function () {
        //             if ( table.api().column(i).search() !== this.value ) {
        //                 table
        //                 .api().column(i)
        //                 .search( this.value )
        //                 .draw();
        //             }
        //         });
        //     }
        // });
        $(document).ready(function(){
            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });

            //Creamos una fila en el head de la tabla y lo clonamos para cada columna
            $('#example thead tr').clone(true).appendTo('#example thead');

            $('#example thead tr:eq(1) th').each(function(i) {
                var title = $(this).text(); //es el nombre de la columna
                $(this).html('<input type="text" placeholder="Search...' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
@endsection
