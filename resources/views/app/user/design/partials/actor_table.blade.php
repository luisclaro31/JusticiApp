<thead>
<tr>
    <th>Identificacion</th>
    <th>Nombres y Apellidos</th>
    <th>Email</th>
    <th>Tipo</th>
    <th>Acciones <i class="fa fa-refresh fa-spin fa-lg"> </i></th>
</tr>
</thead>
<tbody>
@foreach($results as $result)
    <tr>
        <td>{{ $result->identification }}</td>
        <td>{{ $result->full_name }}</td>
        <td>{{ $result->email }}</td>
        <td>{{ $result->type->description }}</td>
        <td><a class="btn btn-info btn-sm" href="{{ route('user.actor.edit', $result)  }}">Editar <i class="fa fa-pencil fa-lg"></i> o <i class="fa fa-trash fa-lg"></i> Eliminar</a></td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>Identificacion</th>
    <th>Nombres y Apellidos</th>
    <th>Email</th>
    <th>Tipo</th>
    <th>Acciones <i class="fa fa-refresh fa-spin fa-lg"> </i></th>
</tr>
</tfoot>