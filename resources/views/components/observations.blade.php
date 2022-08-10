<table class="table table-light">
    <tbody>
        @foreach($observations as $observation)
            <tr>
                <td>{{observation->id}}</td>
                <td>{{observation->observacion}}</td>
                <td>{{observation->activo}}</td>
                <td>{{observation->created_at}}</td>
                <td>{{observation->updated_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
