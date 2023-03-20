<tbody>
    @foreach ($data as $item)         
    <tr>
        <td>{{ $item->a }}</td>
        <td>{{ $item->b }}</td>
        <td>{{ $item->c }}</td>
        <td>{{ $item->d }} {{ $item->e }} {{ $item->f }}</td>
        <td>{{ $item->g }} {{ $item->h }} {{ $item->i }}</td>
        <td>{{ $item->j }}</td>
        <td>{{ $item->k }}</td>
        <td>{{ $item->l }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{ $item->q }}</td>
        <td>{{ $item->r }}</td>
        <td>{{ $item->s }}</td>
        <td>{{ $item->t }}</td>
        <td>{{ $item->u }}</td>
        <td>{{ $item->v }}</td>
        <td>{{ $item->w }}</td>
        <td>{{ $item->x }}</td>
        <td>{{ $item->y }}</td>
        <td>{{ $item->z }}</td>
        <td>{{ $item->zz }}</td>
        <td>{{ $item->zy }} {{ $item->zx }} {{ $item->zw }}</td>
    </tr>
    @endforeach 
</tbody>