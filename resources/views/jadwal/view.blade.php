<table style="display: none;">
    @foreach ($file as $item)
        <tr>
            <td>{{ $item->file }}</td>
            <td>
                <a href="{{ asset('file_jadwal/' . $item->file) }}" class="btn btn-primary btn-sm ms-3" id="myButton"
                    target="_blank">View</a>
            </td>
        </tr>
    @endforeach
</table>

<script>
    window.onload = function() {
        document.getElementById('myButton').click();
        window.location.href = "/jadwal";
    };
</script>
