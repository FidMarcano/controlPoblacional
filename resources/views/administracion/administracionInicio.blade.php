<form method="GET" class="form-horizontal" action="{{ url('/administracion') }}">
    {{ csrf_field() }}
    <table class="table">
        <tr>
            <th>Instrucciones</th>
            <th>Opciones</th>
        </tr>
        <tr>
            <td>
                <p><b>Administrar usuarios</b></p><br>
            </td>
            <td>
                <button name="usuarios"  class="btn btn-primary col-md-12" id="usuarios" type="submit">
                    Usuarios
                </button>
            </td>
        </tr>
        
    </table>
</form>