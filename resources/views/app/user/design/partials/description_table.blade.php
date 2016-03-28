<thead>
<tr>
    <th>#</th>
    <th>Descriscion</th>
    <th>Fecha Creacion</th>
    <th>Tiempo Creacion</th>
    <th>Accions <i class="fa fa-refresh fa-spin fa-lg"> </i></th>
</tr>
</thead>
<tbody>
@foreach($results as $result)
    <tr>
        <td>{{ $result->id }}</td>
        <td>{{ $result->description }}</td>
        <td>{{ $result->created_at->toDateString() }}</td>
        <td>{{ $result->created_at->toTimeString() }}</td>
        <td><a class="btn btn-info btn-sm" href="{{ route('user.type.edit', $result)  }}">Editar <i class="fa fa-pencil fa-lg"></i> o <i class="fa fa-trash fa-lg"></i> Eliminar</a></td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>#</th>
    <th>Descriscion</th>
    <th>Fecha Creacion</th>
    <th>Tiempo Creacion</th>
    <th>Accions <i class="fa fa-refresh fa-spin fa-lg"> </i></th>
</tr>
</tfoot>